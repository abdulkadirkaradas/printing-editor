<template>
    <div class="design-container">
        <div class="inner-design-container">
            <div class="top-bar">
                <div class="project-name"> {{ printingName }} </div>
                <div class="design-actions"></div>
            </div>
            <div class="sidebar">
                <Toolbar></Toolbar>
            </div>
            <div class="content-area">
                <Editor :printingDetail="printingDetail" v-if="printingDetail != null"></Editor>
            </div>
        </div>
    </div>
</template>

<script>
import Editor from './Editor/editor.vue'
import Toolbar from './Toolbar/toolbar.vue'

export default {
    props: {
        printingId: {
            type: String,
            default: null
        },
        // printingDetail: {
        //     type: Object,
        //     default: null
        // }
    },
    data() {
        return {
            printingName: null,
            printingDetail: null
        }
    },
    mounted() {
        this.findPrinting()
    },
    methods: {
        findPrinting() {
            let self = this;
            axios.get(`/find-printing`, { params: { id: self.printingId } }).then(response => {
                // console.log(response.data.data);
                self.printingDetail = response.data.data;
                self.printingName = response.data.data.name;
            });
        }
    },
    components: {
        Editor, Toolbar
    }
}
</script>

<style lang="scss">
    .design-container {
        width: 100%;
        position: relative;

        & .inner-design-container {
            width: 100%;
            position: absolute;

            & .top-bar {
                position: relative;
                width: 100%;
                height: 12vh;
                border: 0.1vw solid black;
                padding: 0.7vw;

                & .project-name {
                    width: 20%;
                    height: 100%;
                    border: 0.1vw solid black;
                    font-size: 1.2vw;
                    position: relative;
                    float: left;
                    justify-content: center;
                    align-items: center;
                    display: flex;
                }

                & .design-actions {
                    width: 80%;
                    height: 100%;
                    border: 0.1vw solid black;
                    position: relative;
                    float: left;
                }
            }

            & .sidebar {
                width: 15%;
                height: 86vh;
                border: 0.1vw solid black;
                position: relative;
                float: left;
                padding: 0.7vw;
            }

            & .content-area {
                width: 85%;
                height: 86vh;
                padding: 1.4vw;
                border: 0.1vw solid black;
                background-color: #ebebeb;
                position: relative;
                float: left;

                justify-content: center;
                align-items: center;
                display: flex;
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
