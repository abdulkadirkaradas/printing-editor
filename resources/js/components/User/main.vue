<template>
    <div class="user-container">
        <div class="card-container">
            <div class="merge">
                <div class="create-button noselect" @click="showModalFunc">Create User</div>
                <div class="title noselect">You can see your all records</div>
            </div>
        </div>
        <div class="popup-container" :class="showModal == false ? `hide` : ``">
            <CreateUserPopup></CreateUserPopup>
        </div>
        <div class="information-container">
            <h1>Information</h1>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';
import CreateUserPopup from './create-user-popup.vue'

export default {
    data() {
        return {
            showModal: false,
        }
    },
    methods: {
        showModalFunc() {
            this.showModal = true;
            $(".popup").fadeIn(300);
        }
    },
    components: {
        CreateUserPopup
    }
}
</script>

<style lang="scss">
    .user-container {
        padding: 20px;

        & .card-container {
            width: 100%;
            height: 100%;
            padding: 10px;
            background-color: white;
            border: 1px solid black;
            margin-bottom: 20px;

            & .merge {
                display: flex;

                & .title {
                    text-align: center;
                    justify-content: center;
                    align-items: center;
                    display: flex;
                    margin-left: 20px;
                    font: normal normal normal 18px/20px Arial;
                }

                & .create-button {
                    width: 120px;
                    background-color: #17A2BB;
                    color: white;
                    padding: 10px;
                    border-radius: 5px;
                    font: normal normal normal 18px/16px Arial;
                    cursor: pointer;
                }
            }
        }

        & .information-container {
            border: 1px solid black;
        }
    }

    .hide {
        display: none !important;
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
