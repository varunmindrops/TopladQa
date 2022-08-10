import utility from '../services/utilities';

export default function(price, tax) {
    if(!price) return 0;
    
    return utility.calculatePriceWithTax(price, tax);
}