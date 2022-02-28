<template>
    <div class="design-container">
        <div class="inner-design-container">
            <div class="top-bar">
                <div class="page-actions"></div>
                <div class="design-actions"></div>
            </div>
            <div class="sidebar">
                <Toolbar></Toolbar>
            </div>
            <div class="content-area">
                <Editor></Editor>
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
        }
    },
    data() {
        return {
        }
    },
    methods: {
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
                border: 1px solid black;
                padding: 10px;

                & .page-actions {
                    width: 20%;
                    height: 100%;
                    border: 1px solid black;
                    position: relative;
                    float: left;
                }

                & .design-actions {
                    width: 80%;
                    height: 100%;
                    border: 1px solid black;
                    position: relative;
                    float: left;
                }
            }

            & .sidebar {
                width: 15%;
                height: 86vh;
                border: 1px solid black;
                position: relative;
                float: left;
                padding: 10px;
            }

            & .content-area {
                width: 85%;
                height: 86vh;
                padding: 20px;
                border: 1px solid black;
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
