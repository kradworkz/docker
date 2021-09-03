<template>
    <div>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Staff Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form @submit.prevent="create">
                    <div class="modal-body">
                      
                        <div class="row customerform" style="margin-right: 10px; margin-left: 10px;">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label>Lastname: <span v-if="errors.lastname" class="haveerror">({{ errors.lastname[0] }})</span></label>
                                    <input type="text" class="form-control" v-model="user.lastname" style="text-transform: capitalize;">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label>Firstname: <span v-if="errors.firstname" class="haveerror">({{ errors.firstname[0] }})</span></label>
                                    <input type="text" class="form-control" v-model="user.firstname" style="text-transform: capitalize;">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label>Initial: <span v-if="errors.middlename" class="haveerror">({{ errors.middlename[0] }})</span></label>
                                    <input type="text" class="form-control" v-model="user.middlename" style="text-transform: capitalize;">
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: -20px;">
                                <myUpload field="img" @crop-success="cropSuccess" v-model="photo.show" :width="500" :height="500" :params="params" :headers="headers" lang-type="en" img-format="png">
                                </myUpload>
                                <div @click="toggleShow" class="fuzone" style="width: 225px; height: 210px;">
                                    <div v-if="photo.url != ''">
                                        <img :src="photo.url" style="width: 200px; height: 200x;">
                                    </div>
                                    <div v-else class="fu-text" @click="toggleShow">
                                        <span><i class="fa fa-picture"></i> Click here to upload<br> <span
                                                v-if="errors.avatar"
                                                style="color: red; font-size: 12px; margin-top: -20px;">
                                                ({{ errors.avatar[0] }})</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 customerform">
                                <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                            <label>Type <span v-if="errors.type" class="haveerror">({{ errors.type[0] }})</span></label>
                                            <multiselect 
                                            v-model="user.type" 
                                            :options="types" 
                                            placeholder="Select Type">
                                            </multiselect>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" v-if="user.type == 'Consortium'">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                            <label>Consortium <span v-if="errors.consortium" class="haveerror">({{ errors.consortium[0] }})</span></label>
                                            <multiselect 
                                            v-model="user.consortium" 
                                            :options="consortiums" 
                                            label="acronym" track-by="id" :show-labels="false" :allow-empty="false"
                                            placeholder="Select Consortium">
                                            </multiselect>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email: <span v-if="errors.email" class="haveerror">({{ errors.email[0] }})</span></label>
                                            <input type="email" class="form-control" v-model="user.email" style="text-transform: lowercase;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile No.: <span v-if="errors.mobile_no" class="haveerror">({{ errors.mobile_no[0] }})</span></label>
                                            <input type="text" class="form-control" v-model="user.mobile_no">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birthdate: <span v-if="errors.birthdate" class="haveerror">({{ errors.birthdate[0] }})</span></label>
                                            <input type="date" class="form-control" v-model="user.birthdate">
                                        </div>
                                    </div>
                                 
                                    <div class="col-md-6" style="margin-top: 5px;">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" class="custom-control-input" checked="checked" value="Male" v-model="user.gender">
                                            <label class="custom-control-label" for="customRadio1">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio2" class="custom-control-input" checked="checked" value="Female" v-model="user.gender">
                                            <label class="custom-control-label" for="customRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>

        <loading :active.sync="isLoading" 
        :can-cancel="true" 
        loader="dots"
        background-color="black"
        :is-full-page="fullPage">
        </loading>

    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import Multiselect from 'vue-multiselect';
    import myUpload from 'vue-image-crop-upload/upload-2.vue';
    export default {
        data(){
            return {
                currentUrl: window.location.origin,
                errors: [], 
                types: ['Secretariat','Consortium'],
                user: {id: '',firstname: '',lastname: '',middlename: '',type: '', gender: '', mobile_no: '',birthdate: '',avatar: '', consortium:''},
                photo: {show: false,url: '',signature: ''},
                params: {token: '123456798',name: 'avatar'},
                headers: {smail: '*_~'},
                editable: false,
                isLoading: false,
                fullPage: true
            }
        },

        created(){
            this.fetch();
        },

        methods : {
            fetch() {
                axios.get(this.currentUrl + '/request/admin/organization/list/4')
                .then(response => {
                    this.consortiums = response.data.data;
                })
                .catch(err => console.log(err));
            },

            create(){
                this.isLoading = true;
                axios.post(this.currentUrl + '/request/admin/staff/store', {
                    id: this.user.id,
                    firstname: this.user.firstname,
                    lastname: this.user.lastname,
                    middlename: this.user.middlename,
                    email: this.user.email,
                    birthdate: this.user.birthdate,
                    gender: this.user.gender,
                    mobile_no: this.user.mobile_no,
                    type: this.user.type,
                    consortium: this.user.consortium,
                    avatar: this.photo.url,
                    editable: this.editable
                })
                .then(response => {
                    this.clear();
                    this.$emit('status', true);
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                     this.isLoading = false;
                });
            },

            edit(user,editable){
                this.user = user;
                this.editable = editable;
            },

            clear(){
                this.editable = false;
                $("#new").modal("hide");
                this.isLoading = false;
                this.empty();
            },

            empty(){
                this.user = {};
            },

            toggleShow() {
                this.photo.show = !this.photo.show;
            },

            cropSuccess(imgDataUrl, field) {
                this.photo.url = imgDataUrl;
            }

        }, components: { Multiselect, myUpload, Loading }
    }
</script>