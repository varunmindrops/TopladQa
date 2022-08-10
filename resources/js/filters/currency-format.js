import numeral from 'numeral';

export default function currencyFormat(value) {
    if(!value) return '-';
    return numeral(value).format('0,0.00');
}
