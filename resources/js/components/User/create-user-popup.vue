<template>
    <div class="popup">
        <div class="popup-fade">
            <div class="merge">
                <div class="popup-item popup-header">
                    Create User
                    <div class="close-button noselect" @click="hide">x</div>
                </div>
                <div class="popup-item popup-body">

                </div>
                <div class="popup-item popup-footer">Footer</div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';

export default {
    props: {
    },
    data() {
        return {
        }
    },
    methods: {
        hide() {
            jQuery(".popup").fadeOut();
        }
    },
    mounted() {
        $(".popup").fadeIn(300);
    },
    components: {
    }
}
</script>

<style lang="scss">
    .popup {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background: rgb(0,0,0, 0.6);
        z-index: 99999;
        display: none;

        & .popup-fade {
            justify-content: center;
            align-content: center;
            display: flex;
            margin-top: 20px;

            & .merge {
                width: 85vw;
                height: 100%;
                background-color: white;
                position: relative;
                background-color: #fff;
                background-clip: padding-box;
                border: 0.2vw solid rgba(0,0,0,.2);
                border-radius: 0.7vw;
                outline: 0;

                & .popup-header {
                    text-align: center;
                    border-bottom: 0.2vw solid #e9ecef;

                    & .close-button {
                        widows: 1vw;
                        font-size: 1.6vw;
                        font-weight: 700;
                        line-height: 1;
                        column-rule-color: #000;
                        text-shadow: 0 1px 0 #fff;
                        margin: 0.5vw 1vw 1vw;
                        float: right;
                        cursor: pointer;
                    }
                }

                & .popup-body {
                    border-bottom: 0.2vw solid #e9ecef;
                }

                & .popup-footer {

                }

                & .popup-item {
                    width: 100%;
                    margin-bottom: 0.5vw;
                    font: normal normal normal 2vw/3vw Arial;
                    padding: 1vw;
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
</style>
