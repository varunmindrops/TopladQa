import { humanize } from "underscore.string";

export default function(value) {
    return value ? humanize(value, true) : '-';
}
