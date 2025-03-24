<template>
    <div class="container">
        <h2>Edit Data</h2>
        <form @submit.prevent="editData">
        <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" v-model="form.nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nis</label>
                <input type="text" v-model="form.nis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" v-model="form.kelas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" v-model="form.jurusan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" v-model="form.alamat" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</template>
<script>

export default{
    props:{
        siswa: Object
    },
    data(){
        return{
            form: {
                nama: this.siswa.nama,
                nis: this.siswa.nis,
                kelas: this.siswa.kelas,
                jurusan: this.siswa.jurusan,
                alamat: this.siswa.jurusan
            }
        };
    },
    methods:{
        editData(){
            this.$inertia.put(`/siswa/${this.siswa.id}`, this.form)
        }
    }
};
</script>