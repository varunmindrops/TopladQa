import * as types from './mutation-types';

export const find = ({ commit }) => {
    commit(types.FIND);
};

export const save = ({ commit }, user) => {
    commit(types.SAVE, user);
};

export const saveAdmin = ({ commit }, admin) => {
    commit(types.SAVE_ADMIN, admin);
};

export const remove = ({ commit }) => {
    commit(types.REMOVE);
};

export const update = ({ commit }, user) => {
    commit(types.UPDATE, user);
};

export const saveMstCategories = ({ commit }, mstCategories) => {
    commit(types.SAVE_MST_CATEGORIES, mstCategories);
};

export default {
    find,
    save,
    remove,
    update,
    saveAdmin,
    saveMstCategories,
};
