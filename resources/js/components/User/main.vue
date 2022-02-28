<template>
    <div class="user-container">
        <div class="card-container">
            <div class="card">
                <div class="merge">
                    <div class="create-button noselect" @click="showPopup">Create User</div>
                    <div class="title noselect">You can see your all records</div>
                </div>
            </div>
        </div>
        <div class="popup-container" :class="isPopupShowed == false ? `hide` : ``">
            <CreateUserPopup></CreateUserPopup>
        </div>
        <div class="information-container">
            <div class="card">
                <div class="card-header">
                    User List
                </div>
                <div class="card-body">
                    <table>
                        <tbody>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td> {{ user.name }} </td>
                                    <td> {{ user.surname }} </td>
                                    <td> {{ user.email }} </td>
                                    <td> {{ user.phone }} </td>
                                    <td> {{ user.address }} </td>
                                    <td v-if="user.image != null">
                                        <a v-bind:href="user.image.file_url" target="_blank" style="display: inline-block;">
                                            <img style="width: 60px;" :src="user.image.file_url">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';
import CreateUserPopup from './create-user-popup.vue'

export default {
    data() {
        return {
            users: Object,
            isPopupShowed: false,
        }
    },
    mounted: function() {
        let self = this;
        axios.get(`/get-all-user`).then(function(response) {
            self.users = response.data.data;
        });
    },
    methods: {
        showPopup() {
            $(".popup").css("display","block");
            this.isPopupShowed = true;
        }
    },
    components: {
        CreateUserPopup
    }
}
</script>

<style lang="scss">
    body {
        background-color: #f4f6f9;
    }

    .user-container {
        padding: 20px;

        & .card-container {
            width: 100%;
            height: 100%;
            padding: 10px;
            background-color: white;
            margin-bottom: 20px;

            & .merge {
                display: flex;
                padding: 10px;

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

            & table {
                width: 100%;

                & thead {

                    & th {
                        width: calc(100% / 6);
                        border: 1px solid #e9e9e9;
                        background: #f9f9f9;
                        padding: 0.5em;
                    }
                }

                & tbody {
                    justify-content: center;
                    align-items: center;
                    display: contents;

                    & td {
                        width: calc(100% / 6);
                        border: 1px solid #e9e9e9;
                        background: #fff;
                        padding: 0.5em;
                    }
                }
            }
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
