@extends('layout.dosen')

@section('title', 'Dashboard Dosen')

@section('content')
<style>
    .dashboard {
        font-family: Arial, sans-serif;
        color: #172b4d;
    }

    .dashboard * {
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .welcome-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 28px;
        margin-bottom: 24px;
        border-radius: 16px;
        color: #fff;
        background: linear-gradient(120deg, #155eef, #4388ff);
        box-shadow: 0 8px 24px rgba(21, 94, 239, .15);
    }

    .welcome-card h1 {
        margin: 0 0 10px;
        font-size: 25px;
    }

    .welcome-card p {
        margin: 0;
        line-height: 1.6;
        color: #eaf1ff;
    }

    .role-badge {
        display: inline-block;
        margin-top: 15px;
        padding: 8px 13px;
        border-radius: 20px;
        background: rgba(255,255,255,.18);
        font-size: 12px;
        font-weight: 700;
    }

    .welcome-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 75px;
        height: 75px;
        border-radius: 20px;
        background: rgba(255,255,255,.18);
        font-size: 35px;
    }

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin: 25px 0 16px;
    }

    .section-heading h2 {
        margin: 0;
        font-size: 19px;
        color: #172b4d;
    }

    .section-heading p {
        margin: 6px 0 0;
        color: #718096;
        font-size: 13px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
    }

    .stat-card {
        padding: 20px;
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(20, 45, 90, .04);
    }

    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
    }

    .stat-label {
        color: #64748b;
        font-size: 13px;
        line-height: 1.5;
    }

    .stat-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: #eaf2ff;
        color: #2463eb;
        font-size: 19px;
    }

    .stat-number {
        margin-top: 15px;
        font-size: 30px;
        font-weight: 700;
        color: #172b4d;
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

    .dashboard table {
        width: 100%;
        border-collapse: collapse;
        min-width: 650px;
    }

    .dashboard th {
        padding: 15px 18px;
        text-align: left;
        background: #f5f8ff;
        color: #526581;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .dashboard td {
        padding: 16px 18px;
        border-top: 1px solid #edf0f5;
        font-size: 13px;
        color: #344563;
        vertical-align: middle;
    }

    .dashboard tbody tr:hover {
        background: #f9fbff;
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
        background: #eef2f7;
        color: #526174;
    }

    .status-approved {
        background: #dcfce7;
        color: #15803d;
    }

    .status-revision {
        background: #fef3c7;
        color: #a16207;
    }

    .status-rejected {
        background: #fee2e2;
        color: #b91c1c;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 9px 13px;
        border: 1px solid transparent;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: .2s ease;
        white-space: nowrap;
    }

    .btn:hover {
        transform: translateY(-1px);
        filter: brightness(.96);
    }

    .btn-blue {
        background: #2563eb;
        color: #fff !important;
        border-color: #2563eb;
    }

    .btn-gray {
        background: #eef2f7;
        color: #475569 !important;
        border-color: #e2e8f0;
    }

    .empty-row {
        padding: 30px !important;
        text-align: center;
        color: #94a3b8 !important;
    }

    .dashboard-note {
        margin-top: 13px;
        color: #8290a5;
        font-size: 12px;
    }

    @media (max-width: 1000px) {
        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .welcome-card {
            padding: 20px;
        }

        .welcome-card h1 {
            font-size: 21px;
        }

        .welcome-icon {
            width: 55px;
            height: 55px;
            font-size: 27px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="dashboard">

    <div class="welcome-card">
        <div>
            <h1>Selamat Datang, Dosen Pembimbing!</h1>
            <p>
                Pantau pengajuan judul mahasiswa dan lihat perkembangan
                proses verifikasi melalui Dashboard SIPETA.
            </p>
            <span class="role-badge">Role: Dosen Pembimbing</span>
        </div>

        <div class="welcome-icon">📘</div>
    </div>

    <div class="section-heading">
        <div>
            <h2>Ringkasan Pengajuan</h2>
            <p>Statistik pengajuan judul mahasiswa berdasarkan status terbaru.</p>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-label">Total Pengajuan</div>
                <div class="stat-icon">📄</div>
            </div>
            <div class="stat-number" id="totalPengajuan">0</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-label">Menunggu Validasi</div>
                <div class="stat-icon">⏳</div>
            </div>
            <div class="stat-number" id="menungguValidasi">0</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-label">Disetujui (ACC)</div>
                <div class="stat-icon">✓</div>
            </div>
            <div class="stat-number" id="disetujui">0</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-label">Perlu Revisi</div>
                <div class="stat-icon">✎</div>
            </div>
            <div class="stat-number" id="perluRevisi">0</div>
        </div>
    </div>

    <div class="section-heading">
        <div>
            <h2>Pengajuan Terbaru</h2>
            <p>Daftar pengajuan beserta status verifikasi terakhir.</p>
        </div>

        <a href="{{ route('dosen.validasi') }}" class="btn btn-blue">
            Buka Verifikasi →
        </a>
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Judul Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="dashboardRows">
                    <tr>
                        <td colspan="6" class="empty-row">Memuat data pengajuan...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="dashboard-note">
        * Data ringkasan diperbarui berdasarkan keputusan pada halaman Verifikasi di browser ini.
    </div>

</div>

<script>
(function () {
    const storageKey = 'sipeta_verifikasi_status_v4';

    function getStudents() {
        try {
            const data = JSON.parse(localStorage.getItem(storageKey) || '[]');
            return Array.isArray(data) ? data : [];
        } catch (error) {
            return [];
        }
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
            value.trim() === 'acc' ||
            value.includes('disetujui dospem')
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

    function renderDashboard() {
        const students = getStudents();

        let waiting = 0;
        let approved = 0;
        let revision = 0;

        students.forEach(function (student) {
            const status = normalizeStatus(student.status).label;

            if (status === 'Menunggu Validasi') waiting++;
            if (status === 'Disetujui') approved++;
            if (status === 'Revisi') revision++;
        });

        document.getElementById('totalPengajuan').textContent = students.length;
        document.getElementById('menungguValidasi').textContent = waiting;
        document.getElementById('disetujui').textContent = approved;
        document.getElementById('perluRevisi').textContent = revision;

        const tbody = document.getElementById('dashboardRows');

        if (!students.length) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="empty-row">
                        Belum ada data pengajuan.
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = students.slice(0, 5).map(function (student, index) {
            const status = normalizeStatus(student.status);
            const pending = status.label === 'Menunggu Validasi';

            return `
                <tr>
                    <td>${index + 1}</td>
                    <td>${escapeHtml(student.nama || '-')}</td>
                    <td>${escapeHtml(student.nim || '-')}</td>
                    <td>${escapeHtml(student.judul || '-')}</td>
                    <td>
                        <span class="status-badge ${status.className}">
                            ${status.label}
                        </span>
                    </td>
                    <td>
                        <a class="btn ${pending ? 'btn-blue' : 'btn-gray'}"
                           href="{{ route('dosen.validasi') }}">
                            ${pending ? 'Periksa' : 'Lihat'}
                        </a>
                    </td>
                </tr>
            `;
        }).join('');
    }

    renderDashboard();

    window.addEventListener('storage', function (event) {
        if (event.key === storageKey) renderDashboard();
    });

    window.addEventListener('focus', renderDashboard);
    window.addEventListener('pageshow', renderDashboard);

    document.addEventListener('visibilitychange', function () {
        if (!document.hidden) renderDashboard();
    });
})();
</script>
@endsection