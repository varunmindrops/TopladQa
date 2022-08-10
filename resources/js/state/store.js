import Vue from 'vue'
import Vuex from 'vuex'

import createLogger from 'vuex/dist/logger';
// Modules
import account from './modules/account/index';
import auth from './modules/auth/index';
import common from './modules/common';

Vue.use(Vuex);
const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    /**
     * Assign the modules to the store.
     */
      modules: {
          account,
          auth,
          common

      },

    /**
     * If strict mode should be enabled.
     */
      strict: debug,

    /**
     * Plugins used in the store.
     */
      plugins: debug ? [createLogger()] : [],
  });
