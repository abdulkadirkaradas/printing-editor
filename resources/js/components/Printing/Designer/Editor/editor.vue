<template>
    <div class="editor-container" id="editorContainer">
        <canvas id="editor"></canvas>
    </div>
</template>

<script>

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
            let properties = this.printingDetail;
            var editor = document.getElementById("editorContainer");
            var canvas = document.getElementById("editor");
            var ctx = canvas.getContext("2d");

            var propertyArray = {
                "editorWidth": editor.clientWidth,
                "editorHeight": editor.clientHeight,
                "propWidth": properties.width,
                "propHeight": properties.height,
            };

            var newScale = this.decreaseExtraSpace(propertyArray);
            console.log(newScale);

            ctx.canvas.width = properties.width;
            ctx.canvas.height = properties.height;

            // ctx.canvas.width = newScale.newWidth;
            // ctx.canvas.height = newScale.newHeight;

            ctx.fillStyle = properties.bgcolor;

            ctx.fillRect(0, 0, properties.width, properties.height);
            // ctx.fillRect(0, 0, newScale.newWidth, newScale.newHeight);
        },
        decreaseExtraSpace(args) {
            var editorWidth = args.editorWidth;
            var editorHeight = args.editorHeight;
            var propWidth = args.propWidth;
            var propHeight = args.propHeight

            var finalWidth = propWidth > editorWidth ? (propWidth * 30) / 100 : propWidth;
            var finalHeight = propHeight > editorHeight ? (propHeight * 30) / 100 : propHeight;

            return {
                "newWidth": finalWidth,
                "newHeight": finalHeight,
                "originalWidth": args.propWidth,
                "originalHeight": args.propHeight
            };
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
