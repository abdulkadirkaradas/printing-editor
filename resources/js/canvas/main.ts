export default class createCanvas {
    init(properties: any, editor: HTMLDivElement, canvas: HTMLCanvasElement, ctx: CanvasRenderingContext2D, args: any) {
        var newScale = this.shrinkDesignArea(args);

        this.draw(properties, newScale, ctx);
    }

    draw(properties: any, args: any, ctx: CanvasRenderingContext2D) {
        ctx.canvas.width = args.newWidth;
        ctx.canvas.height = args.newHeight;

        ctx.fillStyle = properties.bgcolor;

        ctx.fillRect(0, 0, properties.width, properties.height);
    }

    shrinkDesignArea(args: any) {
        var editorWidth = args.editorWidth;
        var editorHeight = args.editorHeight;
        var propWidth = args.propWidth;
        var propHeight = args.propHeight;

        var finalWidth = propWidth > editorWidth ? (propWidth * 30) / 100 : propWidth;
        var finalHeight = propHeight > editorHeight ? (propHeight * 30) / 100 : propHeight;

        return {
            "newWidth": finalWidth,
            "newHeight": finalHeight,
            "originalWidth": args.propWidth,
            "originalHeight": args.propHeight
        };
    }

}
