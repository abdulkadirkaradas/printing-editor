<template>
    <div class="printing-container">
        <div class="top-card noselect">
            <div class="card">
                <div class="merge">
                    <div class="btn btn-md btn-info create-design" @click="activateDesigner">Create Design</div>
                    <div class="text">You can see your all designs</div>
                </div>
            </div>
        </div>

        <div class="bottom-card">
            <div class="card">
                <div class="card-header">Design List</div>
                <div class="card-body">
                    <table>
                        <tbody>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Preview</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="designer-container" :class="isDesignerActive == false ? `hide` : ``">
            <Designer></Designer>
        </div>
        <!-- <div class="designer-container">
            <Designer></Designer>
        </div> -->
    </div>
</template>

<script>
import Designer from './designer.vue';

export default {
    data() {
        return {
            isDesignerActive: "",
        }
    },
    methods: {
        activateDesigner() {
            this.isDesignerActive = true;
        }
    },
    components: {
        Designer
    }
}
</script>

<style lang="scss">
    html, body {
        height: 100%;
    }

    .printing-container {
        height: 100%;

        & .top-card {
            padding: 10px;
            // display: none;

            & .card {

                & .merge {
                    align-items: center;
                    display: flex;
                    padding: 10px;

                    & .create-design {
                        margin-right: 20px;
                    }

                    & .text {
                        font-size: 18px;
                    }
                }
            }
        }

        & .bottom-card {
            padding: 10px;
            // display: none;

            & .card {

                & .card-body {

                    & table {
                        width: 100%;

                        & thead {

                            & th {
                                width: calc(100% / 3);
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
                                width: calc(100% / 3);
                                border: 1px solid #e9e9e9;
                                background: #fff;
                                padding: 0.5em;
                            }
                        }
                    }
                }
            }
        }
    }

    .designer-container {
        width: 100%;
        padding: 1vh;
        position: relative;
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
