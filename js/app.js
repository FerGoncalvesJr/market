var app = new Vue({
    el: "#app",
    data: {
        value: "",
        tax: "",
        sales: [],
        edit_id: "",
        edit_value: "",
        edit_tax: "",
    },
 
    methods: {
        showModal(id) {
            this.$refs[id].show();
        },
        hideModal(id) {
            this.$refs[id].hide();
        },
 
        onSubmit() {
            if (this.value !== "" && this.tax !== "") {
                var fd = new FormData();
 
                fd.append("value", this.value);
                fd.append("tax", this.tax);
 
                axios({
                    url: "insert.php",
                    method: "post",
                    data: fd,
                })
                    .then((res) => {
                        if (res.data.res == "success") {
                            app.makeToast("Success", "Record Added", "default");
 
                            this.value = "";
                            this.tax = "";
 
                            app.hideModal("my-modal");
                            app.getSales();
                        } else {
                            app.makeToast("Error", "Failed to add record. Please try again", "default");
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            } else {
                alert("All field are required");
            }
        },
 
        getSales() {
            axios({
                url: "sales.php",
                method: "get",
            })
                .then((res) => {
                    console.log(res);
                    this.sales = res.data.rows;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
 
        deleteSale(id) {
            if (window.confirm("Delete this sale")) {
                var fd = new FormData();
 
                fd.append("id", id);
 
                axios({
                    url: "delete.php",
                    method: "post",
                    data: fd,
                })
                    .then((res) => {
                        if (res.data.res == "success") {
                            app.makeToast("Success", "Sale delete successfully", "default");
                            app.getSales();
                        } else {
                            app.makeToast("Error", "Failed to delete sale. Please try again", "default");
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },
 
        editSale(id) {
            var fd = new FormData();
 
            fd.append("id", id);
 
            axios({
                url: "edit.php",
                method: "post",
                data: fd,
            })
                .then((res) => {
                    if (res.data.res == "success") {
                        this.edit_id = res.data.row.id;
                        this.edit_value = res.data.row.value;
                        this.edit_tax = res.data.row.tax;
                        app.showModal("my-modal1");
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
 
        onUpdate() {
            if (
                this.edit_value !== "" &&
                this.edit_tax !== "" &&
                this.edit_id !== ""
            ) {
                var fd = new FormData();
 console.log(this);
                fd.append("id", this.edit_id);
                fd.append("value", this.edit_value);
                fd.append("tax", this.edit_tax);
 
                axios({
                    url: "update.php",
                    method: "post",
                    data: fd,
                })
                    .then((res) => {
                        if (res.data.res == "success") {
                            app.makeToast("Sucess", "Record update successfully", "default");
 
                            this.edit_value = "";
                            this.edit_tax = "";
                            this.edit_id = "";
 
                            app.hideModal("my-modal1");
                            app.getSales();
                        }
                    })
                    .catch((err) => {
                        app.makeToast("Error", "Failed to update record", "default");
                    });
            } else {
                alert("All field are required");
            }
        },
 
        makeToast(vNodesTitle, vNodesMsg, variant) {
            this.$bvToast.toast([vNodesMsg], {
                title: [vNodesTitle],
                variant: variant,
                autoHideDelay: 1000,
                solid: true,
            });
        },
    },
 
    mounted: function () {
        this.getSales();
    },
});