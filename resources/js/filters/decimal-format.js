import numeral from 'numeral';

export default function decimalFormat(value) {
    if(!value) return '-';
    return numeral(value).format('0.00');
}
