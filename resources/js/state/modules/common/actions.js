import * as types from './mutation-types';

export const updateLoader = ({ commit }, isLoading) => {
    commit(types.UPDATE_LOADER, isLoading);
};

export const fetchClassExams = ({
    commit
}) => {
    commit(types.FETCH_CLASS_EXAMS);
};
export const saveClassExams = ({
    commit
}, data) => {
    commit(types.SAVE_CLASS_EXAMS, data);
};

export default {
    updateLoader,
    fetchClassExams,
    saveClassExams,
};
