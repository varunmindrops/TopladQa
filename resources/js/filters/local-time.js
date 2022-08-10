import moment from 'moment';

export default function localTime(value, format = 'MMM DD, YYYY h:mm:ss A') {
    if (!value) return '';
    value = value.toString();
    return moment.utc(value).local().format(format);
}
