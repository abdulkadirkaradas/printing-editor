<template>
    <div class="printing-container">
        <div class="top-card noselect">
            <div class="card">
                <div class="merge">
                    <div class="btn btn-md btn-info create-design" @click="activatePage('create-page')">Create Design</div>
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
                                    <th>Name</th>
                                    <th>Background Color</th>
                                    <th>Width (wv)</th>
                                    <th>Height (wh)</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="p in printings" :key="p.id">
                                    <td>{{ p.name }}</td>
                                    <td>
                                        <div v-bind:style="{backgroundColor: p.bgcolor, height: 44 + 'px'}"></div>
                                    </td>
                                    <td>{{ p.width }}</td>
                                    <td>{{ p.height }}</td>
                                    <td> - </td>
                                    <td>
                                        <div class="btn btn-md btn-info" @click="activateEditor(p.id)">
                                            ->
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="designer-container" :class="isDesignerActive == false ? `hide` : ``">
            <Designer :printingId="printingId"></Designer>
        </div>
        <div class="create-page-container" :class="isCreatePageActive == false ? `hide` : ``">
            <CreatePagePopup></CreatePagePopup>
        </div>
        <!-- <div class="designer-container">
            <Designer></Designer>
        </div> -->
    </div>
</template>

<script>
import Designer from './Designer/designer.vue';
import CreatePagePopup from './Popups/create-page-popup.vue';

export default {
    data() {
        return {
            isDesignerActive: false,
            isCreatePageActive: false,
            printings: null,
            printingId: null,
        }
    },
    mounted: function() {
        let self = this;
        axios.get(`/get-all-printings`).then(function(response) {
            console.log(response.data.data);
            self.printings = response.data.data;
        });
    },
    methods: {
        activatePage(value) {
            this.isCreatePageActive = true;
            $(".create-page-popup").css("display","block");
        },
        activateEditor(value) {
            this.printingId = value;
            $(".top-card, .bottom-card").css("display","none");
            this.isDesignerActive = true;
        }
    },
    components: {
        Designer, CreatePagePopup
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
                                width: calc(100% / 4);
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
                                width: calc(100% / 4);
                                border: 1px solid #e9e9e9;
                                background: #fff;
                                padding: 10px;
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
