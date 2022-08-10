import Vue from 'vue';

// Import filters
import Vue2Filters from 'vue2-filters';
import VueMoment from 'vue-moment';
import CurrencyFormat from '@filters/currency-format';
import DateFormat from '@filters/date-format';
import DecimalFormat from '@filters/decimal-format';
import FormatNumber from '@filters/numeral';
import Humanize from '@filters/humanize';
import YesNo from '@filters/yes-no';
import LocalTime from '@filters/local-time';
import UTCTime from '@filters/utc-format';
import Capitalize from '@filters/capitalize';
import DateFromNow from '@filters/date-from-now';
import CalculatePriceWithTax from '@filters/calculate-price-with-tax';

Vue.filter('YesNo', YesNo);
Vue.filter('DateFormat', DateFormat);
Vue.filter('FormatNumber', FormatNumber);
Vue.filter('CurrencyFormat', CurrencyFormat);
Vue.filter('DecimalFormat', DecimalFormat);
Vue.filter('Humanize', Humanize);
Vue.filter('localTime', LocalTime);
Vue.filter('utcTime', UTCTime);
Vue.filter('capitalize', Capitalize);
Vue.filter('dateFromNow', DateFromNow);
Vue.filter('calculatePriceWithTax', CalculatePriceWithTax);

Vue.use(Vue2Filters);
Vue.use(VueMoment);
