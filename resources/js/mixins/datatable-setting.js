import { debounce, isEmpty , cloneDeep} from "lodash";
import { stringify } from "qs";

export default {
    data() {
        return {
            mode: "Add",
            pagination: {
                sortBy: 'created_at',
                order: 'desc'
            },
            search: null,
            totalItems: 0,
            items: [],
            selectedItem: { id : 0},
            rowsPerPageItems : [5,10,50,100,500,1000]
        };
    },
    created() {
        this.$store.dispatch('common/updateLoader', true);

        if (!isEmpty(this.$router.currentRoute.query)) {
            const data = this.$router.currentRoute.query;
            this.search = data.search;
            this.instituteId = +data.institute_id
            // if(this.category) this.category = data.category
            // if(this.selectedDate && this.selectedDate.length) this.selectedDate = data.selectedDate;
            this.pagination = data;
        }
    },
    methods:{
        openModal(type = 'Add', val = null) {
            this.mode = type;
            if(type === 'Edit') {
                this.selectedItem = cloneDeep(val);
            } else {
                this.selectedItem = {}
            }
            this.$refs.modal.open();
        },
        setUrl() {
            let query = {
                page : this.pagination.page,
                sortBy: this.pagination.sortBy,
                descending: this.pagination.descending,
                rowsPerPage: this.pagination.rowsPerPage,
            };
            if (this.search) query.search = this.search;
            if(this.instituteId) query.institute_id = this.instituteId
            // if (this.category) query.category = this.category;
            // if (this.selectedDate && this.selectedDate.length) query.selectedDate = this.selectedDate;
            window.history.pushState({}, '', `?${stringify(query)}`);
        },
        async remove(id, label, api) {
            const message = `Are you sure you want to delete ?`;

            this.$confirm(message, `Delete ${label}` , {
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                type: "error",
                showCancelButton: true,
                lockScroll: false,
            }).then(async () => {
                await this.$http.delete(api, id);
                this.$utility.showSucessMessage(`${label} successfully deleted`);
                this.getData();
            });
        },
        debounceSearch: debounce(function() {
            this.setUrl();
            this.getData();
        }, 700),
    },
    watch: {
        pagination(val) {
            console.log('pagination val', val);
            this.setUrl();
            this.getData();
        },
    },
};
