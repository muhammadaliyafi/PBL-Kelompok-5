
@extends('layout.dosen')

@section('title', 'Verifikasi Judul')

@section('content')

@php
    /*
    | Data diambil dari controller.
    | Pastikan controller mengirim variabel $proposals
    | dan model PengajuanJudul memiliki relasi user().
    */
    $proposalData = collect($proposals ?? [])->map(function ($p) {
        return [
            'id' => $p->id,
            'name' => $p->user->nama ?? '-',
            'nim' => $p->user->nim ?? '-',
            'title' => $p->judul_ta ?? '-',
            'topic' => $p->nama_topik ?? '-',
            'case' => $p->jenis_kasus ?? '-',
            'genre' => $p->genre_game ?? '-',
            'tools' => $p->tools_game ?? '-',
            'integration' => $p->integrasi_sistem ?? '-',
            'description' => $p->deskripsi_judul ?? '-',
            'status' => $p->status ?? 'Menunggu Verifikasi',
            'date' => $p->created_at
                ? $p->created_at->format('Y-m-d')
                : '',
            'note' => $p->catatan ?? '',
        ];
    })->values();
@endphp

<style>
    .verification-page {
        font-family: Arial, sans-serif;
        color: #153c78;
    }

    .verification-page * {
        box-sizing: border-box;
    }

    .page-heading { margin-bottom: 22px; }

    .page-title {
        margin: 0 0 5px;
        color: #153c78;
        font-size: 28px;
        font-weight: 700;
    }

    .page-subtitle {
        margin: 0;
        color: #6682ad;
        font-size: 13px;
        line-height: 1.6;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 18px;
    }

    .stat-card {
        min-height: 116px;
        padding: 22px;
        background: #fff;
        border: 1px solid #e1eafa;
        border-radius: 13px;
    }

    .stat-label {
        display: block;
        color: #5c78a2;
        font-size: 12px;
        margin-bottom: 8px;
    }

    .stat-number {
        color: #153c78;
        font-size: 29px;
        font-weight: 700;
    }

    .stat-card.blue { border-color: #c4d9ff; }
    .stat-card.yellow { border-color: #ffe2a6; }
    .stat-card.green { border-color: #bcebd8; }
    .stat-card.pink { border-color: #ffd0dc; }

    .verification-panel {
        padding: 19px;
        background: #fff;
        border: 1px solid #e1eafa;
        border-radius: 13px;
        margin-bottom: 18px;
    }

    .filter-grid {
        display: grid;
        grid-template-columns: minmax(180px, 2fr)
            minmax(135px, 1.2fr)
            minmax(115px, .8fr);
        gap: 10px;
    }

    .verification-page .form-control,
    .verification-page .form-select {
        min-height: 42px;
        border: 1px solid #dce7f8;
        border-radius: 8px;
        color: #294c7d;
        font-size: 13px;
    }

    .panel-heading {
        margin: 0 0 16px;
        color: #153c78;
        font-size: 16px;
        font-weight: 700;
    }

    .table-wrap {
        width: 100%;
        overflow-x: auto;
        border: 1px solid #e1eafa;
        border-radius: 9px;
    }

    .proposal-table {
        width: 100%;
        min-width: 1150px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .proposal-table thead th {
        padding: 14px 12px;
        background: #f0f5ff;
        color: #284a7e;
        font-size: 12px;
        white-space: nowrap;
        border-bottom: 1px solid #dce7f8;
    }

    .proposal-table tbody td {
        padding: 14px 12px;
        color: #34547e;
        font-size: 12px;
        line-height: 1.6;
        border-bottom: 1px solid #e8eef8;
        vertical-align: middle;
    }

    .proposal-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .title-cell {
        min-width: 240px;
        max-width: 330px;
        overflow-wrap: anywhere;
    }

    .status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 10px;
        white-space: nowrap;
    }

    .status.pending { color: #49658f; background: #eaf1fc; }
    .status.approved { color: #087c4b; background: #d7f8e9; }
    .status.revision { color: #925900; background: #fff0c8; }
    .status.rejected { color: #b42345; background: #ffe0e5; }
    .status.closed { color: #515b70; background: #e8e9ee; }

    .btn-action {
        padding: 8px 11px;
        margin: 2px 1px;
        border: 0;
        border-radius: 6px;
        background: #2865ef;
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .btn-action:hover {
        background: #1e54d0;
        color: #fff;
    }

    .table-info {
        margin-top: 12px;
        color: #6682ad;
        font-size: 12px;
    }

    .verification-page .modal-content {
        border: 1px solid #e1eafa;
        border-radius: 13px;
        color: #153c78;
        font-size: 13px;
    }

    .verification-page .modal-header,
    .verification-page .modal-footer {
        border-color: #e1eafa;
    }

    .verification-page .modal-title {
        font-size: 17px;
        font-weight: 700;
    }

    .detail-table {
        width: 100%;
    }

    .detail-table td {
        padding: 10px 5px;
        vertical-align: top;
        overflow-wrap: anywhere;
    }

    .detail-label {
        width: 170px;
        color: #6682ad;
        font-weight: 500;
    }

    .detail-box {
        padding: 16px;
        border: 1px solid #e1eafa;
        border-radius: 9px;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    .note-preview {
        padding: 15px;
        background: #f4f7fd;
        border: 1px solid #e1eafa;
        border-radius: 9px;
    }

    @media (max-width: 1200px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .filter-grid { grid-template-columns: repeat(2, 1fr); }
        .page-title { font-size: 24px; }
    }

    @media (max-width: 480px) {
        .stats-grid,
        .filter-grid { grid-template-columns: 1fr; }

        .verification-panel { padding: 13px; }
        .stat-card { min-height: 95px; padding: 16px; }
        .detail-label { width: 115px; }
    }
</style>

<div class="verification-page">

    <div class="page-heading">
        <h1 class="page-title">Verifikasi Judul</h1>
        <p class="page-subtitle">
            Kelola pengajuan judul mahasiswa dan periksa kelengkapan
            informasi pengajuan sebelum memberikan keputusan.
        </p>
    </div>

    <!-- STATISTIK -->
    <div class="stats-grid">
        <div class="stat-card blue">
            <span class="stat-label">Total Pengajuan</span>
            <div class="stat-number" id="total">0</div>
        </div>

        <div class="stat-card yellow">
            <span class="stat-label">Menunggu Validasi</span>
            <div class="stat-number" id="pendingCount">0</div>
        </div>

        <div class="stat-card green">
            <span class="stat-label">Disetujui (ACC)</span>
            <div class="stat-number" id="approvedCount">0</div>
        </div>

        <div class="stat-card pink">
            <span class="stat-label">Perlu Revisi</span>
            <div class="stat-number" id="revisionCount">0</div>
        </div>
    </div>

    <!-- FILTER -->
    <div class="verification-panel">
        <div class="filter-grid">
            <input
                type="text"
                id="searchInput"
                class="form-control"
                placeholder="Cari nama, NIM, atau judul..."
            >

            <select id="statusFilter" class="form-select">
                <option value="">Semua Status</option>
                <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                <option value="Menunggu Validasi">Menunggu Validasi</option>
                <option value="Disetujui (ACC)">Disetujui (ACC)</option>
                <option value="Revisi">Revisi</option>
                <option value="Ditolak">Ditolak</option>
                <option value="Ditutup">Ditutup</option>
            </select>

            <select id="yearFilter" class="form-select">
                <option value="">Semua Tahun</option>
            </select>
        </div>
    </div>

    <!-- TABEL -->
    <div class="verification-panel">
        <h2 class="panel-heading">Daftar Pengajuan Judul</h2>

        <div class="table-wrap">
            <table class="proposal-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Mahasiswa</th>
                        <th>NIM</th>
                        <th>Judul Tugas Akhir</th>
                        <th>Topik Utama</th>
                        <th>Integrasi Sistem</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="proposalTable">
                    <tr>
                        <td colspan="9" class="text-center">
                            Memuat data...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-info" id="tableInfo"></div>
    </div>
</div>

<!-- MODAL DETAIL -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pengajuan Judul</h5>
                <button type="button" class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" id="detailContent"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL KEPUTUSAN -->
<div class="modal fade" id="decisionModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="decisionForm">
                <div class="modal-header">
                    <h5 class="modal-title">Periksa Pengajuan Judul</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="decisionId">

                    <div class="detail-box mb-3" id="decisionSummary"></div>

                    <div class="mb-3">
                        <label for="decisionStatus" class="form-label fw-bold">
                            Keputusan Verifikasi
                        </label>

                        <select id="decisionStatus" class="form-select" required>
                            <option value="Disetujui (ACC)">Disetujui (ACC)</option>
                            <option value="Revisi">Perlu Revisi</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>

                    <div class="note-preview">
                        <strong>Catatan Dosen</strong>

                        <p class="mt-2 mb-2" id="noteStatusText">
                            Belum ada catatan.
                        </p>

                        <button type="button"
                            class="btn btn-outline-primary btn-sm"
                            onclick="openNoteModal()">
                            + Tambah Catatan
                        </button>
                    </div>

                    <textarea id="decisionNote" hidden></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Batal</button>

                    <button type="submit" class="btn btn-primary">
                        Simpan Keputusan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL CATATAN -->
<div class="modal fade" id="noteModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Catatan Dosen</h5>
                <button type="button" class="btn-close"
                    onclick="cancelNoteModal()"></button>
            </div>

            <div class="modal-body">
                <label for="noteDraft" class="form-label fw-bold">
                    Isi Catatan
                </label>

                <textarea
                    id="noteDraft"
                    class="form-control"
                    rows="5"
                    maxlength="500"
                    placeholder="Tuliskan alasan keputusan atau bagian yang perlu diperbaiki..."
                ></textarea>

                <div class="d-flex justify-content-between mt-2">
                    <small id="noteRequirement">
                        Catatan boleh kosong jika ACC.
                    </small>
                    <small><span id="noteCharCount">0</span>/500</small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    onclick="cancelNoteModal()">Batal</button>

                <button type="button" class="btn btn-primary"
                    onclick="saveNoteDraft()">Simpan Catatan</button>
            </div>
        </div>
    </div>
</div>

<script>
    /*
    |--------------------------------------------------------------------------
    | DATA DARI LARAVEL
    |--------------------------------------------------------------------------
    */

    let proposals = @json($proposalData);

    const pendingStatuses = [
        'Menunggu Validasi',
        'Menunggu Verifikasi',
        'Pending'
    ];

    function escapeHTML(value) {
        return String(value ?? '-').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }

    function getModal(id) {
        return bootstrap.Modal.getOrCreateInstance(
            document.getElementById(id)
        );
    }

    function isPending(status) {
        return pendingStatuses.includes(status);
    }

    function statusClass(status) {
        if (isPending(status)) return 'pending';
        if (status === 'Disetujui (ACC)') return 'approved';
        if (status === 'Revisi') return 'revision';
        if (status === 'Ditolak') return 'rejected';
        if (status === 'Ditutup') return 'closed';
        return 'pending';
    }

    function formatDate(date) {
        if (!date) return '-';

        const parsed = new Date(date + 'T00:00:00');

        if (isNaN(parsed.getTime())) return '-';

        return parsed.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
    }

    function updateStatistics() {
        document.getElementById('total').textContent = proposals.length;

        document.getElementById('pendingCount').textContent =
            proposals.filter(p => isPending(p.status)).length;

        document.getElementById('approvedCount').textContent =
            proposals.filter(p => p.status === 'Disetujui (ACC)').length;

        document.getElementById('revisionCount').textContent =
            proposals.filter(p => p.status === 'Revisi').length;
    }

    /*
    |--------------------------------------------------------------------------
    | TABEL PENGAJUAN
    |--------------------------------------------------------------------------
    */

    function renderTable() {
        const search = document.getElementById('searchInput')
            .value.toLowerCase().trim();

        const selectedStatus =
            document.getElementById('statusFilter').value;

        const selectedYear =
            document.getElementById('yearFilter').value;

        const filtered = proposals.filter(p => {
            const matchesSearch = [
                p.name,
                p.nim,
                p.title,
                p.topic,
                p.integration
            ].some(value =>
                String(value ?? '').toLowerCase().includes(search)
            );

            const matchesStatus =
                !selectedStatus || p.status === selectedStatus;

            const matchesYear =
                !selectedYear || (p.date || '').startsWith(selectedYear);

            return matchesSearch && matchesStatus && matchesYear;
        });

        const tbody = document.getElementById('proposalTable');

        if (filtered.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="9" class="text-center py-4">
                        Tidak ada data pengajuan.
                    </td>
                </tr>
            `;
        } else {
            tbody.innerHTML = filtered.map((p, index) => `
                <tr>
                    <td>${index + 1}</td>
                    <td>${escapeHTML(p.name)}</td>
                    <td>${escapeHTML(p.nim)}</td>
                    <td class="title-cell">${escapeHTML(p.title)}</td>
                    <td>${escapeHTML(p.topic)}</td>
                    <td class="title-cell">${escapeHTML(p.integration)}</td>
                    <td>
                        <span class="status ${statusClass(p.status)}">
                            ${escapeHTML(p.status)}
                        </span>
                    </td>
                    <td>${formatDate(p.date)}</td>
                    <td>
                        ${isPending(p.status) ? `
                            <button class="btn-action"
                                onclick="openDecision(${Number(p.id)})">
                                Periksa
                            </button>
                        ` : `
                            <button class="btn-action"
                                onclick="showDetail(${Number(p.id)})">
                                Lihat
                            </button>
                        `}
                    </td>
                </tr>
            `).join('');
        }

        document.getElementById('tableInfo').textContent =
            `Menampilkan ${filtered.length} dari ${proposals.length} pengajuan`;

        updateStatistics();
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL LENGKAP SESUAI FORMULIR PENGAJUAN JUDUL
    |--------------------------------------------------------------------------
    */

    function showDetail(id) {
        const p = proposals.find(item => Number(item.id) === Number(id));

        if (!p) return;

        document.getElementById('detailContent').innerHTML = `
            <table class="detail-table">
                <tr>
                    <td class="detail-label">Nama Mahasiswa</td>
                    <td>${escapeHTML(p.name)}</td>
                </tr>
                <tr>
                    <td class="detail-label">NIM</td>
                    <td>${escapeHTML(p.nim)}</td>
                </tr>
                <tr>
                    <td class="detail-label">Topik Utama</td>
                    <td>${escapeHTML(p.topic)}</td>
                </tr>
                <tr>
                    <td class="detail-label">Judul Tugas Akhir</td>
                    <td><strong>${escapeHTML(p.title)}</strong></td>
                </tr>
                <tr>
                    <td class="detail-label">Jenis Kasus</td>
                    <td>${escapeHTML(p.case)}</td>
                </tr>
                <tr>
                    <td class="detail-label">Genre Game</td>
                    <td>${escapeHTML(p.genre)}</td>
                </tr>
                <tr>
                    <td class="detail-label">Tools Game</td>
                    <td>${escapeHTML(p.tools)}</td>
                </tr>
                <tr>
                    <td class="detail-label">Integrasi Sistem</td>
                    <td>${escapeHTML(p.integration)}</td>
                </tr>
                <tr>
                    <td class="detail-label">Deskripsi Judul</td>
                    <td>
                        <div class="detail-box">
                            ${escapeHTML(p.description)}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="detail-label">Status</td>
                    <td>
                        <span class="status ${statusClass(p.status)}">
                            ${escapeHTML(p.status)}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="detail-label">Tanggal Pengajuan</td>
                    <td>${formatDate(p.date)}</td>
                </tr>
                <tr>
                    <td class="detail-label">Catatan Dosen</td>
                    <td>${escapeHTML(p.note || 'Belum ada catatan.')}</td>
                </tr>
            </table>
        `;

        getModal('detailModal').show();
    }

    /*
    |--------------------------------------------------------------------------
    | MODAL KEPUTUSAN
    |--------------------------------------------------------------------------
    */

    function openDecision(id) {
        const p = proposals.find(item => Number(item.id) === Number(id));

        if (!p || !isPending(p.status)) return;

        document.getElementById('decisionId').value = p.id;
        document.getElementById('decisionStatus').value = 'Disetujui (ACC)';
        document.getElementById('decisionNote').value = '';
        document.getElementById('noteDraft').value = '';
        document.getElementById('noteCharCount').textContent = '0';

        document.getElementById('decisionSummary').innerHTML = `
            <strong>${escapeHTML(p.name)}</strong>
            <span class="text-secondary">(${escapeHTML(p.nim)})</span>

            <div class="mt-2">
                <strong>Judul:</strong> ${escapeHTML(p.title)}
            </div>

            <div class="mt-2">
                <strong>Topik:</strong> ${escapeHTML(p.topic)}
            </div>

            <div class="mt-2">
                <strong>Integrasi Sistem:</strong>
                ${escapeHTML(p.integration)}
            </div>
        `;

        updateNoteInformation();
        getModal('decisionModal').show();
    }

    function updateNoteInformation() {
        const status = document.getElementById('decisionStatus').value;
        const note = document.getElementById('decisionNote').value.trim();

        document.getElementById('noteStatusText').textContent =
            note ? 'Catatan sudah ditambahkan.' : 'Belum ada catatan.';

        document.getElementById('noteRequirement').textContent =
            status === 'Disetujui (ACC)'
                ? 'Catatan boleh dikosongkan jika ACC.'
                : 'Catatan wajib diisi untuk keputusan Revisi atau Ditolak.';
    }

    function openNoteModal() {
        const currentNote =
            document.getElementById('decisionNote').value;

        document.getElementById('noteDraft').value = currentNote;
        document.getElementById('noteCharCount').textContent =
            currentNote.length;

        getModal('decisionModal').hide();

        document.getElementById('decisionModal')
            .addEventListener('hidden.bs.modal', function () {
                getModal('noteModal').show();
            }, { once: true });
    }

    function saveNoteDraft() {
        const note = document.getElementById('noteDraft').value.trim();

        document.getElementById('decisionNote').value = note;

        updateNoteInformation();
        getModal('noteModal').hide();

        document.getElementById('noteModal')
            .addEventListener('hidden.bs.modal', function () {
                getModal('decisionModal').show();
            }, { once: true });
    }

    function cancelNoteModal() {
        getModal('noteModal').hide();

        document.getElementById('noteModal')
            .addEventListener('hidden.bs.modal', function () {
                getModal('decisionModal').show();
            }, { once: true });
    }

    document.getElementById('noteDraft')
        .addEventListener('input', function () {
            document.getElementById('noteCharCount').textContent =
                this.value.length;
        });

    document.getElementById('decisionStatus')
        .addEventListener('change', updateNoteInformation);

    /*
    |--------------------------------------------------------------------------
    | SIMPAN KEPUTUSAN SEMENTARA DI TAMPILAN
    |--------------------------------------------------------------------------
    | Bagian ini belum menyimpan perubahan ke database.
    | Integrasi penyimpanan memerlukan route dan controller Laravel.
    */

    document.getElementById('decisionForm')
        .addEventListener('submit', function (event) {
            event.preventDefault();

            const id = Number(
                document.getElementById('decisionId').value
            );

            const p = proposals.find(item => Number(item.id) === id);

            const status =
                document.getElementById('decisionStatus').value;

            const note =
                document.getElementById('decisionNote').value.trim();

            if (!p || !isPending(p.status)) return;

            if (
                (status === 'Revisi' || status === 'Ditolak') &&
                !note
            ) {
                alert('Catatan wajib diisi untuk keputusan Revisi atau Ditolak.');
                return;
            }

            p.status = status;
            p.note = note;

            getModal('decisionModal').hide();
            renderTable();

            alert(
                'Tampilan berhasil diperbarui. Keputusan belum tersimpan ke database.'
            );
        });

    /*
    |--------------------------------------------------------------------------
    | FILTER
    |--------------------------------------------------------------------------
    */

    document.getElementById('searchInput')
        .addEventListener('input', renderTable);

    document.getElementById('statusFilter')
        .addEventListener('change', renderTable);

    document.getElementById('yearFilter')
        .addEventListener('change', renderTable);

    const years = [
        ...new Set(
            proposals
                .map(p => (p.date || '').substring(0, 4))
                .filter(Boolean)
        )
    ].sort().reverse();

    years.forEach(year => {
        document.getElementById('yearFilter').add(
            new Option(year, year)
        );
    });

    renderTable();
</script>

@endsection
