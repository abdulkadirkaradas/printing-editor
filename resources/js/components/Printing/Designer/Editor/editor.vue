import canvas from '../../../../canvas/main';
import createCanvas from '../../../../canvas/main';
<template>
    <div class="editor-container" id="editorContainer">
        <canvas id="editor"></canvas>
    </div>
</template>

<script>
import createCanvas from '../../../../canvas/main';

export default {
    props: {
        printingDetail: {
            type: Object,
            default: null
        }
    },
    data() {
        return {
        }
    },
    mounted() {
        this.drawCanvas()
    },
    methods: {
        drawCanvas(){
            var properties = this.printingDetail;
            var editor = document.getElementById("editorContainer");
            var canvas = document.getElementById("editor");
            var ctx = canvas.getContext("2d");

            var args = {
                "editorWidth": editor.clientWidth,
                "editorHeight": editor.clientHeight,
                "propWidth": properties.width,
                "propHeight": properties.height,
            };

            let draw = new createCanvas();
            draw.init(properties, editor, canvas, ctx, args);
        },
    },
    components: {
    }
}
</script>

<style lang="scss">
    .editor-container {
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        display: flex;
        overflow: scroll;
        overflow-x: scroll;

        & canvas {
            position: relative;
        }
    }
</style>
