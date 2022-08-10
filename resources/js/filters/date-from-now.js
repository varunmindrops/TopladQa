import moment from 'moment';

export default function dateFormat(value, format='MMM DD, YYYY') {
    if(!value) return '-';
    return moment(value).fromNow();
}
