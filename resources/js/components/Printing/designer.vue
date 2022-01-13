<template>
    <div class="design-container">
        <div class="inner-design-container">
            <div class="top-bar">
            </div>
            <div class="side-bar"></div>
            <div class="content-area">
                <div class="inner-content-area"></div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
        }
    },
    methods: {
    },
    components: {
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

                & .create-new-page {
                    width: 75px;
                    height: 75px;

                }
            }

            & .side-bar {
                width: 15%;
                height: 86vh;
                border: 1px solid black;
                position: relative;
                float: left;
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

                & .inner-content-area {
                    width: 100%;
                    height: 100%;
                    background-color: white;
                    -webkit-box-shadow: 1px 1px 7px 2px #B0B0B0;
                    box-shadow: 1px 1px 7px 2px #B0B0B0;
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
