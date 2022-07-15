const target = document.getElementById("menu");
target.addEventListener("click", () => {
    target.classList.toggle("open");
    const nav = document.getElementById("nav");
    nav.classList.toggle("in");
});

const tabs = document.getElementsByClassName("tab-menu__item");
for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", tabSwitch);
}
function tabSwitch() {
    document.getElementsByClassName("active")[0].classList.remove("active");
    this.classList.add("active");
    document.getElementsByClassName("show")[0].classList.remove("show");
    const arrayTabs = Array.prototype.slice.call(tabs);
    const index = arrayTabs.indexOf(this);
    document
        .getElementsByClassName("tab-content__item")
        [index].classList.add("show");
}

var search__input = document.getElementsByClassName("search__input");

for (let i = 0; i < search__input.length; i++) {
    search__input[i].addEventListener("input", function () {
        search__form.submit();
    });
}

var search__change = document.getElementById("shop_name");
search__change.addEventListener("input", function () {
    search__form.submit();
});
