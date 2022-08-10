import numeral from 'numeral';

export default function formatNumber(value, options = '0,0') {
    return numeral(value).format(options);
}

/*
A javascript library for formatting and manipulating numbers.

[Website and documentation](http://numeraljs.com/)
*/
