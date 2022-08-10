import moment from 'moment';

export default function dateFormat(value, format = 'MMM DD, YYYY h:mm:ss A') {
    return moment(value).utc().format(format);
}
