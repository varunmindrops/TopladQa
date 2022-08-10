import Axios from 'axios';
import state from '@state/store';
import Vue from 'vue';
import {
    stringify,
} from 'qs';

function createAxios() {
    const axios = Axios.create();

    console.log('process.env.MIX_APP_URL', process.env.MIX_APP_URL);

    axios.defaults.baseURL = process.env.MIX_APP_URL + '/api/';
    axios.defaults.headers.common['Content-Type'] = 'application/json';
    axios.defaults.timeout = 1000 * 60 * 3; // 3 min timeout

    axios.interceptors.request.use(
        (conf) => {
            // state.dispatch('common/updateLoader', true);
            return conf;
        },
        (error) => {
            // state.dispatch('common/updateLoader', false);
            return Promise.reject(error);
        },
    );

    axios.interceptors.response.use(
        (response) => {
            // state.dispatch('common/updateLoader', false);
            return response;
        },
        (error) => {
            // state.dispatch('common/updateLoader', false);

            if (error && error.response && error.response.status === 401) {
                state.dispatch('auth/logout');
            }
            if (error && error.response) {
                return Promise.reject(error.response.data);
            }
            return Promise.reject(error);
        },
    );
    return axios;
}

// Initialise Axios
const api = createAxios();

const service = {

    getHeaders() {
        const token = localStorage.getItem('x-access-token');
        return {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`
        };
    },

    // POST services
    async postWithoutHeaders(route, body) {
        const {
            data,
        } = await api.post(route, body);
        return Promise.resolve(data);
    },

    async rawPost(path, payload) {
        const headers = this.getHeaders();

        const {
            data,
        } = await api.post(path, payload, {
            headers,
        });

        return Promise.resolve(data.data);
    },

    async postFile(path, payload) {
        const headers = this.getHeaders();
        headers['Content-Type'] = 'multipart/form-data';

        const formData = new FormData();

        const formFields = Object.keys(payload)
        for (const key of formFields) {
            formData.append(key, payload[key]);
        }

        const {
            data
        } = await api.post(path, formData, {
            headers
        })

        return Promise.resolve(data.data);
    },

    // GET services
    async getById(route, id) {
        if (!id) return null;

        const headers = this.getHeaders();

        const {
            data,
        } = await api.get(`${route}/${id}`, {
            headers,
        });
        return Promise.resolve(data.data);
    },

    async get(route, query = {}) {
        const headers = this.getHeaders();
        const {
            data,
        } = await api.get(`${route}?${stringify(query)}`, {
            headers,
        });

        return data.data;
    },

    // Get File
    async getFile(path, payload = {}) {
        const headers = this.getHeaders();
        const {
            data,
        } = await api.post(path, payload, {
            headers,
            responseType: 'blob',
        });
        return Promise.resolve(data);
    },

    async getWithoutHeaders(route) {
        const {
            data,
        } = await api.get(route);
        return Promise.resolve(data);
    },

    // PUT services
    async rawPut(path, payload) {
        const headers = this.getHeaders();

        const {
            data,
        } = await api.put(path, payload, {
            headers,
        });

        return Promise.resolve(data.data);
    },

    async updateById(route, id, body, showLoader = true) {
        if (!id) return null;

        const headers = this.getHeaders();

        headers.showLoader = showLoader;

        const {
            data,
        } = await api.put(`${route}/${id}`, body, {
            headers,
        });
        return Promise.resolve(data.data);
    },

    async update(route, query = {}, body = {}) {
        const headers = this.getHeaders();
        const {
            data,
        } = await api.put(`${route}?${stringify(query)}`, body, {
            headers,
        });
        return Promise.resolve(data.data);
    },

    async createOrUpdate(route, body) {
        const headers = this.getHeaders();

        let response;
        if (body.id) {
            response = await this.updateById(route, body.id, body, {
                headers,
            });
        } else {
            response = await this.rawPost(route, body, {
                headers,
            });
        }

        return Promise.resolve(response);
    },

    // PATCH services
    async patch(route, body) {
        const headers = this.getHeaders();
        const {
            data,
        } = await api.patch(`${route}`, body, {
            headers,
        });
        return Promise.resolve(data);
    },

    // DELETE services
    async delete(route, id) {
        if (!id) return null;

        const headers = this.getHeaders();

        return api.delete(`${route}/${id}`, {
            headers,
        });
    },

    async bulkDelete(route, items = []) {
        const filteredItems = items.filter(i => i.id);

        if (filteredItems && !filteredItems.length) return null;

        return Promise.all(filteredItems.map(i => this.delete(route, i.id)));
    },

    async bulkDeleteWithoutHook(route, items = []) {
        const headers = this.getHeaders();

        const ids = items.map(i => i.id);

        console.log('delete ids', route, ids);

        if (ids && !ids.length) return null;

        const {
            data,
        } = await api.delete(route, {
            headers,
            data: ids,
        });

        return Promise.all(data.data);
    },

    // Generic
    async instanceMethod(route, id, action, {
        method,
        payload,
    } = {
            method: 'get',
        }) {
        const headers = this.getHeaders();
        const args = [{
            headers,
        }];
        // Add the payload to the arguments for poast requests
        if (payload) {
            args.unshift(payload);
        }
        const {
            data,
        } = await api[method](`${route}/${id}/${action}`, ...args);
        return Promise.resolve(data);
    },

    // Bulk operations
    async bulkCreate(path, items) {
        const headers = this.getHeaders();
        const newItems = [];

        items.forEach(async (item) => {
            const {
                data,
            } = await api.post(path, item, {
                headers,
            });

            newItems.push(data.data);
        });
        return Promise.resolve(newItems);
    },

    async bulkCreateWithoutHook(path, items) {
        const headers = this.getHeaders();

        const {
            data,
        } = await api.post(path, items, {
            headers,
        });

        return Promise.resolve(data);
    },

    async bulkcreateOrUpdate(route, items) {
        const headers = this.getHeaders();
        const newItems = [];

        for (const item of items) {
            let response = null;

            if (item.id) {
                response = await this.updateById(route, item.id, item, {
                    headers,
                });
            } else {
                response = await this.rawPost(route, item, {
                    headers,
                });
            }
            newItems.push(response);
        }
        return Promise.resolve(newItems);
    },

    async uploadFile(route, file, folderName = '', field = '') {
        const headers = this.getHeaders();

        const formData = new FormData();

        formData.append("image", file);
        // formData.append("upload_preset", this.cloudinary.uploadPreset);

        if (folderName) formData.append("directory", folderName);
        if (field) formData.append("field", field);
        const {
            data,
        } = await api.post(route, formData, {
            headers,
        });

        return Promise.resolve(data);
    }
};

// Bind Axios to Vue$
Vue.$http = service;
Object.defineProperty(Vue.prototype, '$http', {
    get() {
        return service;
    },
});

export default service;
