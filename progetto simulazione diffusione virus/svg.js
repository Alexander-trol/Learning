const svgNS = 'http://www.w3.org/2000/svg'; // svg namespace

class G { // base class of our svg elements
    #id; #x; #y;
    #g; #elem; // the element is surrounded by a generic container g

    constructor(parent, name, id, attrs) {
        this.#g = document.createElementNS(svgNS, 'g');
        this.#id = id;
        this.#g.setAttribute('id', id);
        this.#elem = document.createElementNS(svgNS, name);
        this.#g.appendChild(this.#elem);
        if (undefined !== attrs)
            this.setAttrs(attrs);
        parent.appendChild(this.#g);
    }

    // add read-only visibility to some private fields
    get g() { return this.#g; }
    get elem() { return this.#elem; }
    get id() { return this.#id; }
    get x() { return this.#x; }
    get y() { return this.#y; }

    setAttrs = function(attrs) {
        for(let key in attrs)
            this.#elem.setAttribute(key, attrs[key]);
        return this;
    }

    // place us @(x, y)
    setPos = function(x, y) {
        this.#x = x; this.#y = y;
        this.#g.setAttribute('transform', `translate(${this.#x}, ${this.#y})`);
    }

    move = function(dx, dy) {
        this.setPos(this.#x + dx, this.#y + dy);
    }
}


class Circle extends G {
    constructor(parent, id, r) {
        super(parent, 'circle', id, { r: r });
        //this.elem.addEventListener('click', this.onClick);
    }
}

// --  other examples  --
class Rect extends G {
    constructor(parent, id, width, height) {
        super(parent, 'rect', id, { width: width, height: height });
    }
}

class Square extends Rect {
    constructor(parent, id, side) {
        super(parent, id, side, side);
    }
}
//const square = new Square(svg, 'quad', 50).setPos(100, 100);