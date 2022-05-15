/**
 * @description Provides drawing various shapes, text, images etc. on described properties
 *
 * @class Canvas
*/

export default class Canvas {
    printingDetails;
    editor;
    canvas;
    ctx;
    editorWidth;
    editorHeight;
    printingWidth;
    printingHeight;
    editorBgColor;

    init(printingDetails, editor, canvas) {
        this.printingDetails = printingDetails;
        this.editor = editor;
        this.canvas = canvas;
    }

    setEnvironments() {
        this.editorWidth = this.editor.clientWidth;
        this.editorHeight = this.editor.clientHeight;
        this.printingWidth = this.printingDetails.width;
        this.printingHeight = this.printingDetails.height;
        this.editorBgColor = this.printingDetails.bgcolor;

        this.ctx = this.canvas.getContext("2d");
    }

    setCtxProperties() {
        this.ctx.canvas.width = this.printingWidth;
        this.ctx.canvas.height = this.printingHeight;

        this.ctx.fillStyle = this.editorBgColor;
        this.ctx.fillRect(0, 0, this.printingWidth, this.printingHeight);
    }

    draw() {
        this.setEnvironments();
        this.setCtxProperties();
    }
}
