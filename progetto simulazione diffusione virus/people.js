class Health {

}


class Person extends Circle {
    #parent;
    // direction and speed
    #angle = Math.random() * 2 * Math.PI;
    #speed = speed / 2 + Math.random() * speed; 
    #acc = 0;

    // health
    #ticksToHealth = 0;
    #tthM; // maximum sickness

    constructor(parent, id) {
        super(parent, id, radius);
        this.#parent = parent;
        // a Person is a Circle with a text label
        const idLabel = document.createElementNS(svgNS, 'text');
        idLabel.textContent = id; // the label text is the element id
        this.g.appendChild(idLabel);
    }

    static diameter = 2 * radius;

    /** are we (this Person) touching person p? */
    hitsPerson = function(p) {
        const distance = Math.sqrt(Math.pow(this.x - p.x, 2) + Math.pow(this.y - p.y, 2)); // euclidean
        if (Person.diameter <= distance)
            return false;
        // if we hit, badly try to disengage
        this.#angle = -(Math.PI - this.#angle);
        p.#angle = -(Math.PI - p.#angle);
        // equate the speed of colliding individuals
        const avg = (this.#speed + p.#speed) / 2;
        this.#speed = p.#speed = avg;

        // one person may contagiate the other
        if (p.#ticksToHealth > 0) {
            if (this.#ticksToHealth == 0)
                this.contagiate();
        } else if (this.#ticksToHealth > 0) {
            if (p.#ticksToHealth == 0)
                p.contagiate();
        }

        return true;
    }

    hitsHWalls = function() { // did we hit any Horizontal wall?
        return this.y - radius < 0 || sHeight < this.y + radius;
    }
    hitsVWalls = function() { // ... vertical
        const hvw = this.x - radius < 0 || sWidth < this.x + radius;
        return hvw;
    }

    moveRandom = function() {
        // slightly turn direction
        const turn = -turnAngle / 2 + turnAngle * Math.random();
        this.#angle += turn;
        // slightly accelerate
        this.#acc = (- speed / 20) + Math.random() * (2 * speed / 20);
        this.#speed += this.#acc;
        // then move according to angle and speed
        const dx = this.#speed * Math.cos(this.#angle), dy = this.#speed * Math.sin(this.#angle);
        this.move(dx, dy);

        // turn back if we hit any wall
        if (this.hitsVWalls()) {
            this.#angle = Math.PI - this.#angle;
            this.move(-dx, 0);
        }
        if (this.hitsHWalls()) {
            this.#angle = - this.#angle;
            this.move(0, -dy);
        }
    }

    /** we got infected */
    contagiate = function() {
        // days to recovery
        this.#ticksToHealth = this.#tthM = 10 + Math.round(Math.random() * (ticksToHealth - 10));
        this.elem.style.fill = 'red';
        this.elem.style.opacity = this.#ticksToHealth / ticksToHealth;
    }

    /** a day in a life (cit.) */
    clockTick = function() {
        this.moveRandom(); // wander around a bit
        if (0 == this.#ticksToHealth) // healthy
            return;
        // here we are sick, but recove a bit
        --this.#ticksToHealth;
        // as we recover, the color intensity decreases
        this.elem.style.opacity = this.#ticksToHealth / this.#tthM;
        if (0 == this.#ticksToHealth) {
            this.elem.style.fill = 'white';
            this.elem.style.opacity = 1;
        }
    }
}

/** the population is an Array of individuals ;-) */
class People extends Array {
    #parent;
    #names;
    static #cnt = 0; // global counter

    constructor(parent, n, names) {
        super();
        this.#parent = parent;
        this.#names = names;
        n += People.#cnt;
        do {
            this.#addPerson(People.#cnt);
        } while (++People.#cnt < n);
    }

    /** create a Person and place it so as not to touch anybody;
     * the Person is added to this population
     */
    #addPerson = function(n) {
        // choose a new Id
        let id = this.#names[n % this.#names.length];
        const it = Math.floor(n / this.#names.length);
        if (0 != it)
            id += it;
        // create a new Person
        const person = new Person(this.#parent, id);
        // and place it so as it does not hit anyone
        do {
            const nx = People.#rndPos(sWidth), ny = People.#rndPos(sHeight);
            person.setPos(nx, ny);
        } while (this.anyHit(person));
        this.push(person); // add to this population

        if (this.length % initialSickness === 0)
            person.contagiate(); // initial spread of the virus
        return person;
    }

    static #rndPos = function (dimension) { // utility f.
        return radius + Math.floor(Math.random() * (dimension - Person.diameter));
    }

    /** see if the new person touches anyone */
    anyHit = (person) => {
        for (const p of this)
            if (p.hitsPerson(person))
                return true;
        return false;
    }

    /** let our world evolve a bit */
    clockTick = () => {
        this.forEach((p) => {
            p.clockTick();
        });

        // handle hits
        for (let i = 0; i < this.length - 1; i++) {
            for (let j = i + 1; j < this.length; j++) {
                const a = this[i], b = this[j];
                if (a.hitsPerson(b)) {
                    // (try to) move away
                    a.moveRandom();
                    b.moveRandom();
                }
            }
        }
    }
}

class QuintaI extends People {
    constructor(parent) {
        const alunni = 
            [ 'SA', 'PAS', 'MBa', 'FB', 'AB', 'LB',
              'AAB', 'MBe', 'NB', 'MBo', 'NC', 'RC', 
              'CDC', 'SC', 'MCC', 'AG', 'PG', 'NG',
              'FG', 'AMH', 'MYZH', 'AM', 'AN', 'MP', 
              'GR', 'GS', 'RS', 'ES'
            ];
        super(parent, alunni.length, alunni);
    }
}
//const people = new QuintaI(svg);