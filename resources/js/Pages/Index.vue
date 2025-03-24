<template>
    <div class="container">
    <h2>Daftar Siswa</h2>
    <a href="/siswa/create" class="btn btn-primary">Tambah Siswa</a>
    <table  class="table table-bordered">
        <thead> 
            <tr>
                <th>Nama</th>
                <th>Nis</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="siswa in siswas" :key="siswa.id">
                <td>{{ siswa.nama }}</td>
                <td>{{ siswa.nis }}</td>
                <td>{{ siswa.kelas }}</td>
                <td>{{ siswa.jurusan }}</td>
                <td>{{ siswa.alamat }}</td>
                <td> 
                    <img :src="getImageUrl(siswa.image)" alt="siswa">
                </td>
                <td>
                    <a :href="'/siswa/' + siswa.id + '/edit'" class="btn btn-success" >Edit</a>
                    <button @click="deleteData(siswa.id)" class="btn btn-warning">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>
<script>

    export default{
        props:{
            'siswas' :Array
        },

        methods:{
            deleteData(id){
                this.$inertia.delete(`/siswa/${id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                    },
            getImageUrl(imagePath) {
                return imagePath ? `/storage/${imagePath}` : '/img/image_siswa.jpg';
                    }
                });
            }
        }
    }
</script>