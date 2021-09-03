<template>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reasearch Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form @submit.prevent="create">
                <div class="modal-body">
                    <div class="row customerform" style="margin-right: 10px; margin-left: 10px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title: <span v-if="errors.title" class="haveerror">({{ errors.title[0] }})</span></label>
                                <input type="text" class="form-control" v-model="research.title" style="text-transform: capitalize;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Classification<span v-if="errors.classification" class="haveerror">({{ errors.classification[0] }})</span></label>
                                <multiselect 
                                v-model="research.classification" 
                                :options="classifications" 
                                label="name" track-by="id" :show-labels="false" :allow-empty="false"
                                placeholder="Select Classification">
                                </multiselect>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Specialty<span v-if="errors.specialty" class="haveerror">({{ errors.specialty[0] }})</span></label>
                                <multiselect 
                                v-model="research.specialty" 
                                :options="specialties" 
                                    label="name" track-by="id" :show-labels="false" :allow-empty="false"
                                placeholder="Select Specialty">
                                </multiselect>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>IPR Status<span v-if="errors.iprstatus" class="haveerror">({{ errors.iprstatus[0] }})</span></label>
                                <multiselect 
                                v-model="research.iprstatus" 
                                :options="iprs" 
                                label="name" track-by="id" :show-labels="false" :allow-empty="false"
                                placeholder="Select Specialty">
                                </multiselect>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><span v-if="editable == false">Save</span><span v-else>Update</span></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import Multiselect from 'vue-multiselect';
    export default {
        data(){
            return {
                currentUrl: window.location.origin,
                errors: [], 
                research : {
                    id: '',
                    title : '',
                    classification: '',
                    specialty: '',
                    iprstatus: ''
                },
                classifications: [],
                specialties: [],
                iprs: [],
                editable : false
            }
        },

        created(){
            this.fetchClassification();
            this.fetchSpecialty();
            this.fetchIpr();
        },

        methods : {

            fetchClassification() {
                axios.get(this.currentUrl + '/request/admin/dropdown/Classifications/-/-')
                .then(response => {
                    this.classifications = response.data.data;
                })
                .catch(err => console.log(err));
            },

            fetchSpecialty() {
                axios.get(this.currentUrl + '/request/admin/dropdown/Specialties/-/-')
                .then(response => {
                    this.specialties = response.data.data;
                })
                .catch(err => console.log(err));
            },

            fetchIpr() {
                axios.get(this.currentUrl + '/request/admin/dropdown/Status/IPR Status/-')
                .then(response => {
                    this.iprs = response.data.data;
                })
                .catch(err => console.log(err));
            },

            create(){
                axios.post(this.currentUrl + '/request/researcher/research/store', {
                    id: this.research.id,
                    title: this.research.title,
                    classification: this.research.classification.id,
                    specialty: this.research.specialty.id,
                    iprstatus: this.research.iprstatus.id,
                    editable: this.editable
                })
                .then(response => {
                    (this.editable == true) ? this.$emit('status', 'edit') : this.$emit('status', true) ;
                    this.clear();
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                     this.isLoading = false;
                });
            },

            edit(research){
                this.editable = true;
                this.research = research;
            },

            clear(){
                this.research = {};
                this.editable = false;
            }

           
        }, components: { Multiselect, Loading }
    }
</script>