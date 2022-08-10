import { humanize } from 'underscore.string';

export default function percentage(value) {
    if(!value) return '-';
    return humanize(value);
}
