Nova.booting((Vue, router) => {
    Vue.component(
        "index-generate-password",
        require("./components/IndexField").default
    );
    Vue.component(
        "detail-generate-password",
        require("./components/DetailField").default
    );
    Vue.component(
        "form-generate-password",
        require("./components/FormField").default
    );
});
