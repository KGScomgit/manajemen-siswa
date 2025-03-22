<template>
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
                    <a href="">Edit</a>
                    <button href="">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script>
</script>