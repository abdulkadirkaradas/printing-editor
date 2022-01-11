<template>
    <div class="popup">
        <div class="popup-fade">
            <div class="merge">
                <div class="popup-item popup-header">
                    Create User
                </div>
                <div class="popup-item popup-body">
                    <form method="POST" id="user_store_form" enctype="multipart/form-data">
                        <div class="user-info">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="">Surname</label>
                                <input class="form-control" type="text" name="surname" id="surname">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input class="form-control" type="text" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input class="form-control" type="text" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input class="form-control" type="text" name="address" id="address">
                            </div>
                        </div>
                        <div class="user-images" style="display: none;">
                            <div class="form-group">
                                <div class="upload-area noselect" @click="uploadFiles">
                                    <input type="file" name="images" id="file-uploader" v-on:change="onFileChange">
                                    <Icon icon="bx:bxs-file-image" color="#3f86ff" width="120" height="120" />
                                    <div class="description">Please click for upload your image</div>
                                </div>
                            </div>
                        </div>
                        <div class="save-close-buttons center">
                            <div class="previous-button btn btn-md btn-warning center" style="display: none;" @click="getPage('prev')">Previous</div>
                            <div class="save-button btn btn-md btn-info center" style="display: none;" @click="serializeForm">Save</div>
                            <div class="next-button btn btn-md btn-info center" @click="getPage('next')">Next</div>
                            <div class="close-button btn btn-md btn-danger center" @click="hide">Close</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';
import { Icon } from '@iconify/vue2';

export default {
    data() {
        return {
            file: "",
        }
    },
    methods: {
        hide() {
            $(".popup input").val("");
            $(".user-info, .next-button").show();
            $(".user-images, .previous-button, .save-button").hide();
            $(".popup").fadeOut();
        },
        serializeForm() {
            var name = $("#name").val(),
            surname = $("#surname").val(),
            email = $("#email").val(),
            phone = $("#phone").val(),
            address = $("#address").val();

            let formData = new FormData();
            formData.append("name", name);
            formData.append("surname", surname);
            formData.append("email", email);
            formData.append("phone", phone);
            formData.append("address", address);
            formData.append("images", this.file);

            axios.post(`/store-user`, formData).then(function(response) {
                console.log(response);
            });
            this.hide();
        },
        onFileChange(e) {
            this.file = e.target.files[0];
        },
        getPage(name) {
            if(name == "next") {
                $(".user-info, .next-button").hide();
                $(".user-images, .previous-button, .save-button").show();
            } else {
                $(".user-info, .next-button").show();
                $(".user-images, .previous-button, .save-button").hide();
            }
        },
        uploadFiles() {
            $("#file-uploader").click();
        }

    },
    mounted() {
        $(".popup").fadeIn(300);
    },
    components: {
        Icon
    }
}
</script>

<style lang="scss">
    @import url('https://fonts.googleapis.com/css2?family=Dongle&family=Oswald:wght@300&display=swap');

    .popup {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        bottom: 0;
        background: #00000099;
        z-index: 99999;
        display: none;

        & .popup-fade {
            width: auto;
            height: auto;
            justify-content: center;
            align-content: center;
            display: flex;
            padding: 20px;

            & .merge {
                width: 650px;
                height: 100%;
                position: relative;
                background-color: white;
                background-clip: padding-box;
                border: 3px solid rgba(0,0,0,.2);
                border-radius: 5px;
                outline: 0;

                & .popup-header {
                    text-align: center;
                    border-bottom: 3px solid #e9ecef;
                }

                & .popup-body {
                    height: auto;

                    & .user-info {

                        & .form-group {

                            & label {
                                font-size: 21px;
                            }

                            & input {
                                height: 55px;
                                border: 2px solid #ced4da;
                                border-radius: 3px;
                                font-size: 30px;
                                padding: 2px 2px;
                            }
                        }
                    }

                    & .user-images {

                        & .form-group {

                            & .upload-area {
                                width: 100%;
                                height: 400px;
                                background-color: white;
                                border: 2px dashed;
                                border-radius: 25px;
                                cursor: pointer;
                                justify-content: center;
                                align-items: center;
                                display: flex;
                                flex-direction: column;
                                font: normal normal normal 30px/30px arial;

                                & input {
                                    visibility: hidden;
                                    width: 1px;
                                    height: 1px;
                                }

                                & i {
                                    color: dodgerblue;
                                    font-size: 2.5em ;
                                }

                                & .description {
                                    font: normal normal normal 40px/50px Oswald;
                                }
                            }
                        }
                    }

                    & .save-close-buttons {

                        & div {
                            border: 3px solid transparent;
                            border-radius: 3px;
                            font-size: 20px;
                            width: 120px;
                            height: 50px;
                            margin: 5px;
                        }
                    }
                }

                // & .popup-footer {

                // }

                & .popup-item {
                    width: 100%;
                    // margin-bottom: 0.5vw;
                    font: normal normal normal 30px/42px Arial;
                    padding: 10px;
                }
            }
        }
    }

    .noselect {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .center {
        justify-content: center;
        align-items: center;
        display: flex;
    }
</style>
