@extends('layout.dosen')

@section('title', 'Verifikasi Judul')

@section('content')
<style>
    .verification-page {
        font-family: Arial, sans-serif;
        color: #172b4d;
    }

    .verification-page * {
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .page-heading {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 24px;
    }

    .heading-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 52px;
        flex-shrink: 0;
        border-radius: 14px;
        color: #2563eb;
        background: #eaf2ff;
        font-size: 25px;
    }

    .page-heading h1 {
        margin: 0 0 7px;
        font-size: 25px;
        color: #172b4d;
    }

    .page-heading p {
        margin: 0;
        color: #718096;
        font-size: 13px;
        line-height: 1.6;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 15px;
        margin-bottom: 24px;
    }

    .summary-card {
        padding: 18px;
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 13px;
    }

    .summary-label {
        color: #718096;
        font-size: 12px;
        line-height: 1.5;
    }

    .summary-number {
        margin-top: 10px;
        font-size: 27px;
        font-weight: 700;
        color: #172b4d;
    }

    .filter-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .filter-bar h2 {
        margin: 0;
        font-size: 18px;
    }

    .filter-bar p {
        margin: 6px 0 0;
        color: #718096;
        font-size: 12px;
    }

    .search-input {
        width: 290px;
        max-width: 100%;
        padding: 11px 13px;
        border: 1px solid #d7dfeb;
        border-radius: 9px;
        outline: none;
        background: #fff;
        color: #172b4d;
        font-size: 13px;
    }

    .search-input:focus,
    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
    }

    .table-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(20, 45, 90, .04);
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .verification-page table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
    }

    .verification-page th {
        padding: 15px 17px;
        background: #f3f7ff;
        color: #526581;
        text-align: left;
        font-size: 12px;
        white-space: nowrap;
    }

    .verification-page td {
        padding: 15px 17px;
        border-top: 1px solid #edf0f5;
        color: #344563;
        font-size: 13px;
        vertical-align: middle;
    }

    .verification-page tbody tr:hover {
        background: #f9fbff;
    }

    .student-name {
        font-weight: 700;
        color: #172b4d;
    }

    .student-nim {
        margin-top: 5px;
        color: #8290a5;
        font-size: 11px;
    }

    .status-badge {
        display: inline-block;
        padding: 7px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-waiting {
        color: #526174;
        background: #eef2f7;
    }

    .status-approved {
        color: #15803d;
        background: #dcfce7;
    }

    .status-revision {
        color: #a16207;
        background: #fef3c7;
    }

    .status-rejected {
        color: #b91c1c;
        background: #fee2e2;
    }

    .btn {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        padding: 9px 13px;
        border: 1px solid transparent;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: .2s ease;
        white-space: nowrap;
    }

    .btn:hover {
        filter: brightness(.96);
        transform: translateY(-1px);
    }

    .btn-blue {
        color: #fff;
        background: #2563eb;
        border-color: #2563eb;
    }

    .btn-acc {
        color: #fff;
        background: #16a34a;
        border-color: #16a34a;
    }

    .btn-revisi {
        color: #854d0e;
        background: #facc15;
        border-color: #facc15;
    }

    .btn-tolak {
        color: #fff;
        background: #dc2626;
        border-color: #dc2626;
    }

    .btn-gray {
        color: #475569;
        background: #eef2f7;
        border-color: #e2e8f0;
    }

    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
    }

    .empty-row {
        padding: 30px !important;
        text-align: center;
        color: #94a3b8 !important;
    }

    .activity-card {
        margin-top: 24px;
        padding: 20px;
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 14px;
    }

    .activity-card h2 {
        margin: 0 0 15px;
        font-size: 17px;
    }

    .activity-item {
        padding: 12px 0;
        border-top: 1px solid #edf0f5;
        font-size: 12px;
        line-height: 1.6;
        color: #526174;
    }

    .activity-item:first-of-type {
        border-top: 0;
    }

    .activity-time {
        display: block;
        margin-top: 4px;
        color: #94a3b8;
        font-size: 11px;
    }

    /* Modal */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 18px;
        background: rgba(15, 23, 42, .55);
    }

    .modal-overlay.show {
        display: flex;
    }

    .modal-box {
        width: 100%;
        max-width: 650px;
        max-height: 90vh;
        overflow-y: auto;
        padding: 25px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(15, 23, 42, .2);
    }

    .modal-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 20px;
    }

    .modal-header h2 {
        margin: 0 0 7px;
        font-size: 21px;
    }

    .modal-header p {
        margin: 0;
        color: #718096;
        font-size: 12px;
        line-height: 1.6;
    }

    .modal-close {
        width: 35px;
        height: 35px;
        border: 0;
        border-radius: 9px;
        background: #eef2f7;
        color: #475569;
        font-size: 20px;
        cursor: pointer;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 20px;
    }

    .detail-item {
        padding: 13px;
        border: 1px solid #e8edf5;
        border-radius: 10px;
        background: #fafcff;
    }

    .detail-item.full {
        grid-column: 1 / -1;
    }

    .detail-label {
        margin-bottom: 7px;
        color: #8290a5;
        font-size: 11px;
    }

    .detail-value {
        color: #172b4d;
        font-size: 13px;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .form-group {
        margin-top: 17px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #344563;
        font-size: 12px;
        font-weight: 700;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #d7dfeb;
        border-radius: 9px;
        outline: none;
        color: #172b4d;
        background: #fff;
        font-size: 13px;
    }

    textarea.form-control {
        min-height: 90px;
        resize: vertical;
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 9px;
        margin-top: 22px;
        padding-top: 17px;
        border-top: 1px solid #edf0f5;
    }

    .modal-message {
        display: none;
        margin-top: 14px;
        padding: 11px 13px;
        border-radius: 8px;
        background: #fee2e2;
        color: #b91c1c;
        font-size: 12px;
    }

    .modal-message.show {
        display: block;
    }

    @media (max-width: 900px) {
        .summary-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .summary-grid {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .summary-card {
            padding: 14px;
        }

        .summary-number {
            font-size: 23px;
        }

        .page-heading h1 {
            font-size: 21px;
        }

        .search-input {
            width: 100%;
        }

        .filter-bar {
            align-items: stretch;
        }

        .filter-bar > div {
            width: 100%;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .detail-item.full {
            grid-column: auto;
        }

        .modal-box {
            padding: 19px;
        }
    }
</style>

<div class="verification-page">

    <div class="page-heading">
        <div class="heading-icon">✓</div>
        <div>
            <h1>Verifikasi Judul</h1>
            <p>Periksa pengajuan judul mahasiswa dan berikan keputusan sesuai hasil verifikasi.</p>
        </div>
    </div>

    <div class="summary-grid">
        <div class="summary-card">
            <div class="summary-label">Total Pengajuan</div>
            <div class="summary-number" id="totalCount">0</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Menunggu Validasi</div>
            <div class="summary-number" id="waitingCount">0</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Disetujui (ACC)</div>
            <div class="summary-number" id="approvedCount">0</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Perlu Revisi</div>
            <div class="summary-number" id="revisionCount">0</div>
        </div>
    </div>

    <div class="filter-bar">
        <div>
            <h2>Daftar Pengajuan Mahasiswa</h2>
            <p>Pilih Periksa untuk memproses pengajuan atau Lihat untuk melihat detailnya.</p>
        </div>

        <div>
            <input
                type="text"
                id="searchStudent"
                class="search-input"
                placeholder="Cari nama, NIM, atau judul..."
            >
        </div>
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Mahasiswa</th>
                        <th>Judul Proposal</th>
                        <th>Topik</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="studentRows">
                    <tr>
                        <td colspan="6" class="empty-row">Memuat data pengajuan...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="activity-card">
        <h2>Aktivitas Verifikasi Terbaru</h2>
        <div id="activityList">
            <div class="activity-item">Belum ada aktivitas verifikasi.</div>
        </div>
    </div>

</div>

<!-- Modal Detail dan Keputusan -->
<div class="modal-overlay" id="studentModal">
    <div class="modal-box">
        <div class="modal-header">
            <div>
                <h2 id="modalTitle">Detail Pengajuan</h2>
                <p>Periksa informasi mahasiswa sebelum memberikan keputusan.</p>
            </div>

            <button type="button" class="modal-close" id="closeModal" aria-label="Tutup">
                &times;
            </button>
        </div>

        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label">Nama Mahasiswa</div>
                <div class="detail-value" id="detailNama">-</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">NIM</div>
                <div class="detail-value" id="detailNim">-</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Topik</div>
                <div class="detail-value" id="detailTopik">-</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Status Saat Ini</div>
                <div class="detail-value" id="detailStatus">-</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label">Judul Proposal</div>
                <div class="detail-value" id="detailJudul">-</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label">Deskripsi</div>
                <div class="detail-value" id="detailDeskripsi">-</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label">Catatan Sebelumnya</div>
                <div class="detail-value" id="detailCatatan">Belum ada catatan.</div>
            </div>
        </div>

        <div class="form-group" id="noteGroup">
            <label for="decisionNote">Catatan Dosen</label>
            <textarea
                id="decisionNote"
                class="form-control"
                placeholder="Masukkan catatan atau alasan keputusan..."
            ></textarea>
        </div>

        <div class="modal-message" id="modalMessage"></div>

        <div class="modal-actions" id="decisionActions">
            <button type="button" class="btn btn-gray" id="cancelModal">Batal</button>
            <button type="button" class="btn btn-tolak" data-decision="tolak">Tolak</button>
            <button type="button" class="btn btn-revisi" data-decision="revisi">Revisi</button>
            <button type="button" class="btn btn-acc" data-decision="acc">ACC</button>
        </div>

        <div class="modal-actions" id="viewActions" style="display:none;">
            <button type="button" class="btn btn-gray" id="closeView">Tutup</button>
        </div>
    </div>
</div>

<script>
(function () {
    const storageKey = 'sipeta_verifikasi_status_v4';
    const activityKey = 'sipeta_verifikasi_activities_v4';

    const initialStudents = [
        {
            id: 1,
            nama: 'Aditya Pratama',
            nim: '2301301001',
            topik: 'Sistem Informasi',
            integrasi: 'Web',
            judul: 'Sistem Informasi Pengelolaan Data Akademik Berbasis Web',
            deskripsi: 'Pengembangan sistem informasi untuk membantu pengelolaan dan pencarian data akademik.',
            status: 'Menunggu Validasi Judul',
            catatan: ''
        },
        {
            id: 2,
            nama: 'Citra Lestari',
            nim: '2301301002',
            topik: 'UI/UX',
            integrasi: 'Mobile',
            judul: 'Perancangan UI/UX Aplikasi Layanan Informasi Mahasiswa',
            deskripsi: 'Perancangan antarmuka aplikasi dengan fokus pada kemudahan penggunaan.',
            status: 'Disetujui Dospem · Proses Gugus TA',
            catatan: ''
        },
        {
            id: 3,
            nama: 'Budi Santoso',
            nim: '2301301003',
            topik: 'Basis Data',
            integrasi: 'Web',
            judul: 'Sistem Pengelolaan Data Inventaris Berbasis Web',
            deskripsi: 'Sistem untuk mencatat, mengelola, dan memantau data inventaris.',
            status: 'Menunggu Validasi Judul',
            catatan: ''
        },
        {
            id: 4,
            nama: 'Dewi Anggraini',
            nim: '2301301004',
            topik: 'Sistem Informasi',
            integrasi: 'Web',
            judul: 'Sistem Informasi Pengajuan dan Pengelolaan Surat',
            deskripsi: 'Aplikasi untuk mempermudah pengajuan serta pengelolaan surat.',
            status: 'Disetujui Dospem · Proses Gugus TA',
            catatan: ''
        },
        {
            id: 5,
            nama: 'Eko Prasetyo',
            nim: '2301301005',
            topik: 'Aplikasi Web',
            integrasi: 'Web',
            judul: 'Pengembangan Aplikasi Monitoring Kegiatan Mahasiswa',
            deskripsi: 'Aplikasi untuk membantu pencatatan dan pemantauan kegiatan mahasiswa.',
            status: 'ACC Final',
            catatan: 'Judul telah disetujui.'
        },
        {
            id: 6,
            nama: 'Fitri Handayani',
            nim: '2301301006',
            topik: 'UI/UX',
            integrasi: 'Mobile',
            judul: 'Perancangan Aplikasi Pengingat Jadwal Kegiatan',
            deskripsi: 'Perancangan aplikasi pengingat kegiatan dengan antarmuka yang sederhana.',
            status: 'Revisi (di mahasiswa)',
            catatan: 'Mohon perjelas fitur utama dan ruang lingkup aplikasi.'
        }
    ];

    let students = [];
    let activities = [];
    let activeStudentId = null;
    let modalMode = 'view';

    const modal = document.getElementById('studentModal');
    const noteInput = document.getElementById('decisionNote');
    const modalMessage = document.getElementById('modalMessage');

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, function (char) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            }[char];
        });
    }

    function normalizeStatus(status) {
        const value = String(status || '').toLowerCase();

        if (value.includes('tolak') || value.includes('ditolak')) {
            return {
                label: 'Ditolak',
                className: 'status-rejected'
            };
        }

        if (value.includes('revisi')) {
            return {
                label: 'Revisi',
                className: 'status-revision'
            };
        }

        if (
            value.includes('disetujui') ||
            value.includes('acc final') ||
            value.trim() === 'acc'
        ) {
            return {
                label: 'Disetujui',
                className: 'status-approved'
            };
        }

        return {
            label: 'Menunggu Validasi',
            className: 'status-waiting'
        };
    }

    function isPending(student) {
        return normalizeStatus(student.status).label === 'Menunggu Validasi';
    }

    function loadData() {
        let savedStudents = [];
        let savedActivities = [];

        try {
            savedStudents = JSON.parse(localStorage.getItem(storageKey) || '[]');
            savedActivities = JSON.parse(localStorage.getItem(activityKey) || '[]');
        } catch (error) {
            savedStudents = [];
            savedActivities = [];
        }

        if (!Array.isArray(savedStudents)) savedStudents = [];
        if (!Array.isArray(savedActivities)) savedActivities = [];

        // Gabungkan data contoh dengan data yang telah disimpan.
        const studentMap = new Map();

        initialStudents.forEach(function (student) {
            studentMap.set(String(student.id), { ...student });
        });

        savedStudents.forEach(function (student) {
            if (student && student.id !== undefined && student.id !== null) {
                const key = String(student.id);
                const previous = studentMap.get(key) || {};
                studentMap.set(key, { ...previous, ...student });
            }
        });

        students = Array.from(studentMap.values());
        activities = savedActivities;
    }

    function saveData() {
        try {
            localStorage.setItem(storageKey, JSON.stringify(students));
            localStorage.setItem(activityKey, JSON.stringify(activities));

            // Memberi tahu halaman lain yang memakai penyimpanan ini.
            window.dispatchEvent(new CustomEvent('sipeta-data-updated'));

            return true;
        } catch (error) {
            showMessage('Data gagal disimpan di browser. Periksa pengaturan penyimpanan browser.');
            return false;
        }
    }

    function showMessage(message) {
        modalMessage.textContent = message;
        modalMessage.classList.add('show');
    }

    function hideMessage() {
        modalMessage.textContent = '';
        modalMessage.classList.remove('show');
    }

    function renderSummary() {
        let waiting = 0;
        let approved = 0;
        let revision = 0;

        students.forEach(function (student) {
            const label = normalizeStatus(student.status).label;

            if (label === 'Menunggu Validasi') waiting++;
            if (label === 'Disetujui') approved++;
            if (label === 'Revisi') revision++;
        });

        document.getElementById('totalCount').textContent = students.length;
        document.getElementById('waitingCount').textContent = waiting;
        document.getElementById('approvedCount').textContent = approved;
        document.getElementById('revisionCount').textContent = revision;
    }

    function renderTable() {
        const tbody = document.getElementById('studentRows');
        const search = document.getElementById('searchStudent').value
            .trim()
            .toLowerCase();

        const filteredStudents = students.filter(function (student) {
            const searchable = [
                student.nama,
                student.nim,
                student.judul,
                student.topik
            ].join(' ').toLowerCase();

            return searchable.includes(search);
        });

        if (!filteredStudents.length) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="empty-row">
                        Tidak ada pengajuan yang sesuai dengan pencarian.
                    </td>
                </tr>
            `;
            renderSummary();
            return;
        }

        tbody.innerHTML = filteredStudents.map(function (student) {
            const status = normalizeStatus(student.status);
            const actionButton = isPending(student)
                ? `<button type="button" class="btn btn-blue" data-action="periksa" data-id="${escapeHtml(student.id)}">Periksa</button>`
                : `<button type="button" class="btn btn-gray" data-action="lihat" data-id="${escapeHtml(student.id)}">Lihat</button>`;

            return `
                <tr>
                    <td>${students.indexOf(student) + 1}</td>
                    <td>
                        <div class="student-name">${escapeHtml(student.nama)}</div>
                        <div class="student-nim">${escapeHtml(student.nim)}</div>
                    </td>
                    <td>${escapeHtml(student.judul)}</td>
                    <td>${escapeHtml(student.topik || '-')}</td>
                    <td>
                        <span class="status-badge ${status.className}">
                            ${status.label}
                        </span>
                    </td>
                    <td>${actionButton}</td>
                </tr>
            `;
        }).join('');

        renderSummary();
    }

    function renderActivities() {
        const container = document.getElementById('activityList');

        if (!activities.length) {
            container.innerHTML = `
                <div class="activity-item">Belum ada aktivitas verifikasi.</div>
            `;
            return;
        }

        container.innerHTML = activities.slice(0, 6).map(function (activity) {
            return `
                <div class="activity-item">
                    ${escapeHtml(activity.message)}
                    <span class="activity-time">${escapeHtml(activity.time)}</span>
                </div>
            `;
        }).join('');
    }

    function addActivity(message) {
        activities.unshift({
            message: message,
            time: new Date().toLocaleString('id-ID')
        });

        activities = activities.slice(0, 20);
    }

    function findStudent(id) {
        return students.find(function (student) {
            return String(student.id) === String(id);
        });
    }

    function openModal(id, mode) {
        const student = findStudent(id);
        if (!student) return;

        activeStudentId = student.id;
        modalMode = mode;

        hideMessage();

        document.getElementById('modalTitle').textContent =
            mode === 'review' ? 'Periksa Pengajuan' : 'Detail Pengajuan';

        document.getElementById('detailNama').textContent = student.nama || '-';
        document.getElementById('detailNim').textContent = student.nim || '-';
        document.getElementById('detailTopik').textContent = student.topik || '-';
        document.getElementById('detailJudul').textContent = student.judul || '-';
        document.getElementById('detailDeskripsi').textContent =
            student.deskripsi || 'Tidak ada deskripsi.';
        document.getElementById('detailCatatan').textContent =
            student.catatan || 'Belum ada catatan.';

        const status = normalizeStatus(student.status);
        document.getElementById('detailStatus').innerHTML =
            `<span class="status-badge ${status.className}">${status.label}</span>`;

        const noteGroup = document.getElementById('noteGroup');
        const decisionActions = document.getElementById('decisionActions');
        const viewActions = document.getElementById('viewActions');

        if (mode === 'review' && isPending(student)) {
            noteGroup.style.display = 'block';
            decisionActions.style.display = 'flex';
            viewActions.style.display = 'none';
            noteInput.value = '';
            noteInput.placeholder = 'Isi catatan jika perlu revisi atau menolak pengajuan...';
        } else {
            noteGroup.style.display = 'none';
            decisionActions.style.display = 'none';
            viewActions.style.display = 'flex';
        }

        modal.classList.add('show');
    }

    function closeModal() {
        modal.classList.remove('show');
        activeStudentId = null;
        hideMessage();
    }

    function processDecision(decision) {
        const student = findStudent(activeStudentId);
        if (!student) return;

        if (!isPending(student)) {
            showMessage('Pengajuan ini sudah diproses sebelumnya.');
            return;
        }

        const note = noteInput.value.trim();

        if ((decision === 'revisi' || decision === 'tolak') && !note) {
            showMessage('Isi catatan terlebih dahulu untuk keputusan Revisi atau Tolak.');
            noteInput.focus();
            return;
        }

        let activityMessage = '';

        if (decision === 'acc') {
            student.status = 'Disetujui Dospem · Proses Gugus TA';
            student.catatan = note || 'Judul disetujui oleh dosen pembimbing.';
            activityMessage = student.nama + ' — pengajuan Disetujui.';
        } else if (decision === 'revisi') {
            student.status = 'Revisi (di mahasiswa)';
            student.catatan = note;
            activityMessage = student.nama + ' — pengajuan perlu Revisi.';
        } else if (decision === 'tolak') {
            student.status = 'Ditolak Dospem';
            student.catatan = note;
            activityMessage = student.nama + ' — pengajuan Ditolak.';
        } else {
            return;
        }

        addActivity(activityMessage);

        if (!saveData()) return;

        renderTable();
        renderActivities();
        closeModal();
    }

    document.getElementById('studentRows').addEventListener('click', function (event) {
        const button = event.target.closest('button[data-action]');
        if (!button) return;

        const id = button.dataset.id;
        const action = button.dataset.action;

        if (action === 'periksa') {
            openModal(id, 'review');
        } else if (action === 'lihat') {
            openModal(id, 'view');
        }
    });

    document.getElementById('searchStudent').addEventListener('input', renderTable);

    document.querySelectorAll('[data-decision]').forEach(function (button) {
        button.addEventListener('click', function () {
            processDecision(button.dataset.decision);
        });
    });

    document.getElementById('closeModal').addEventListener('click', closeModal);
    document.getElementById('cancelModal').addEventListener('click', closeModal);
    document.getElementById('closeView').addEventListener('click', closeModal);

    modal.addEventListener('click', function (event) {
        if (event.target === modal) closeModal();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeModal();
    });

    window.addEventListener('storage', function (event) {
        if (event.key === storageKey || event.key === activityKey) {
            loadData();
            renderTable();
            renderActivities();
        }
    });

    window.addEventListener('sipeta-data-updated', function () {
        renderTable();
        renderActivities();
    });

    loadData();

    // Simpan data contoh hanya jika belum ada data tersimpan.
    if (localStorage.getItem(storageKey) === null) {
        saveData();
    }

    renderTable();
    renderActivities();
})();
</script>
@endsection