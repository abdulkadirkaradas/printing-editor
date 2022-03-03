<template>
    <div class="create-page-popup">
        <div class="popup-fade">
            <div class="popup-container">
                <div class="popup-header">
                    Project Attributes
                </div>
                <div class="popup-body">
                    <form method="POST" id="user_store_form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input class="form-control" type="text" id="project_name" placeholder="Please type project name">
                        </div>
                        <div class="form-group">
                            <label for="">Page Width and Height (in pixel)</label>
                            <div class="merge">
                                <input class="form-control mr-1" type="number" min="0" id="page_width" placeholder="Width">
                                <input class="form-control ml-1" type="number" min="0" id="page_height" placeholder="Height">
                            </div>
                        </div>
                        <div class="form-group color-group">
                            <label for="project_b_color">Background Color</label>
                            <input class="form-control form-control-color" type="color" id="project_b_color" value="#000000" @change="getColor($event)">
                            <div class="merge">
                                <div class="btn btn-md btn-info" @click="chooseColor">Choose Color</div>
                                <div class="show-choosed-color"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="popup-footer">
                    <div class="btn btn-md btn-info save-page" @click="saveProjectInformations">Save</div>
                    <div class="btn btn-md btn-danger close-popup ml-1" @click="hide">Close</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';

export default {
    data() {
        return {
            chosenColor: "#000000",
        }
    },
    mounted() {
        $(".create-page-popup").fadeIn(300);
    },
    methods: {
        hide() {
            $(".create-page-popup input").val("");
            $(".create-page-popup").css("display","none");
        },
        chooseColor() {
            $("#project_b_color").click();
        },
        getColor(e) {
            this.chosenColor = e.target.value;
            $(".show-choosed-color").css("background-color", e.target.value);
        },
        saveProjectInformations() {
            let name = $("#project_name").val(),
            width = $("#page_width").val(),
            height = $("#page_height").val(),
            bgcolor = this.chosenColor;

            let formData = new FormData();
            formData.append("name", name);
            formData.append("width", width);
            formData.append("height", height);
            formData.append("bgcolor", bgcolor);

            axios.post(`/store-printings`, formData).then(function(response) {
                console.log(response);
            });
            this.hide();
        }
    },
    mounted() {
        $(".create-page-popup").css("display","block");
        this.isPopupShowed = true;
    },
    components: {
    }
}
</script>

<style lang="scss">
    .create-page-popup {
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

            & .popup-container {
                width: 650px;
                height: 100%;
                position: relative;
                background-color: white;
                background-clip: padding-box;
                border: 3px solid rgba(0,0,0,.2);
                border-radius: 5px;
                outline: 0;

                & .popup-header {
                    padding: 10px;
                    text-align: center;
                    border-bottom: 2px solid #e9ecef;
                }

                & .popup-body {
                    height: auto;
                    padding: 10px;
                    border-bottom: 2px solid #e9ecef;

                    & .form-group {

                        & .merge {
                            display: flex;

                            & input::-webkit-outer-spin-button, input::-webkit-inner-spin-button, input[type=number]{
                                -moz-appearance: textfield;
                                -webkit-appearance: none;
                                margin: 0;
                            }
                        }

                        & #project_b_color {
                            visibility: hidden;
                            width: 1px;
                            height: 1px;
                        }
                    }

                    & .color-group {

                        & label {
                            margin-bottom: 0 !important;
                        }

                        & .merge {
                            justify-content: center;
                            align-items: center;
                            display: flex;

                            & .show-choosed-color {
                                width: 50px;
                                height: 38px;
                                background-color: black;
                                margin-left: 10px;
                            }
                        }
                    }
                }

                & .popup-footer {
                    padding: 10px;
                    justify-content: center;
                    align-items: center;
                    display: flex;
                }
            }
        }
    }
</style>
