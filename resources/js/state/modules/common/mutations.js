import * as types from './mutation-types';
const httpService = require('@services/api');
import store from '@state/store';

export default {
    [types.UPDATE_LOADER](state, isLoading = false) {
        state.isLoading = isLoading;
    },
    async [types.FETCH_CLASS_EXAMS](state) {
        if(state.classExams && !state.classExams.length) {
            const result = await httpService.default.get('classes');
            const items = result && result.items ? result.items : [];

            if (items && items.length) {
                store.dispatch('common/saveClassExams', items);
            }
        }
    },
    [types.SAVE_CLASS_EXAMS](state, data = []) {
        state.classExams = data;
    },
};
