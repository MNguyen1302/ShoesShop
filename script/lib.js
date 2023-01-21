const alertColors = {
    "error": "#eb5e54",
    "success": "#54eb5c"
};

class CreateElement {
    constructor(type, idName, className, content) {
        this.element = document.createElement(type);
        if (idName) this.element.id = idName;
        if (className) this.element.className = className;
        if (content) this.element.innerHTML = content;

        this.appendToDocument();
    }

    addToElement(element) {
        // TODO: do something
    }

    addClassList(className) {
        this.element.classList.add(className);
    }

    removeElement() {
        this.element.remove();
    }

    appendToDocument() {
        document.body.appendChild(this.element);
    }
}

const addAlert = function(content, type = "error") {
    const alert = new CreateElement(
        `div`,
        `alert-display`,
        `alert`,
        `<span>${content}</span>`
    );
    alert.element.style.backgroundColor = alertColors[type];
    setTimeout(() => alert.element.style.left = 0, 100);
    setTimeout(() => {
        alert.element.style.left = `-350px`;
        setTimeout(() => alert.removeElement(), 2000);
    }, 3000);
}
