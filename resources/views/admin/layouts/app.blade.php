<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $title ?? 'Admin | Exlon Tech')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --bg: #0f0715;
            --panel: #140c1c;
            --panel-2: #1b1026;
            --line: rgba(135, 80, 247, 0.22);
            --text: #f7f3ff;
            --muted: #b9a9cf;
            --primary: #8750f7;
            --primary-2: #b57dff;
            --danger: #ef4444;
            --success: #27c46b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Sora', sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(135, 80, 247, 0.24), transparent 28rem),
                linear-gradient(180deg, #0f0715 0%, #050208 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        .admin-shell {
            display: grid;
            grid-template-columns: 17rem minmax(0, 1fr);
            min-height: 100vh;
        }

        .admin-sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 1.5rem;
            background: rgba(10, 6, 16, 0.92);
            border-right: 1px solid var(--line);
        }

        .admin-logo {
            display: inline-flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .admin-logo img {
            width: 10rem;
            max-width: 100%;
        }

        .admin-nav {
            display: grid;
            gap: 0.55rem;
        }

        .admin-nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1rem;
            border-radius: 0.85rem;
            color: var(--muted);
            border: 1px solid transparent;
        }

        .admin-nav a:hover,
        .admin-nav a.active {
            color: #fff;
            background: rgba(135, 80, 247, 0.14);
            border-color: var(--line);
        }

        .admin-main {
            min-width: 0;
        }

        .admin-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 1.75rem;
            border-bottom: 1px solid var(--line);
            background: rgba(15, 7, 21, 0.76);
            backdrop-filter: blur(18px);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .admin-title {
            margin: 0;
            font-size: clamp(1.25rem, 2vw, 1.9rem);
            line-height: 1.2;
        }

        .admin-subtitle {
            margin: 0.35rem 0 0;
            color: var(--muted);
            font-size: 0.9rem;
        }

        .admin-content {
            padding: 1.75rem;
        }

        .admin-card {
            background: linear-gradient(145deg, rgba(27, 16, 38, 0.96), rgba(12, 7, 21, 0.96));
            border: 1px solid var(--line);
            border-radius: 1rem;
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.28);
        }

        .admin-card__body {
            padding: 1.25rem;
        }

        .admin-grid {
            display: grid;
            gap: 1rem;
        }

        .admin-grid--stats {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .stat {
            padding: 1.25rem;
        }

        .stat span {
            display: block;
            color: var(--muted);
            font-size: 0.85rem;
        }

        .stat strong {
            display: block;
            margin-top: 0.65rem;
            font-size: 2rem;
            line-height: 1;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            min-height: 2.75rem;
            padding: 0.75rem 1rem;
            border: 0;
            border-radius: 999px;
            color: #fff;
            cursor: pointer;
            background: linear-gradient(135deg, var(--primary), #6b2fd4);
            box-shadow: 0 10px 24px rgba(135, 80, 247, 0.24);
        }

        .button--ghost {
            background: rgba(135, 80, 247, 0.12);
            box-shadow: none;
            border: 1px solid var(--line);
        }

        .button--danger {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.35);
            box-shadow: none;
        }

        .button--sm {
            min-height: 2.25rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.82rem;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(135, 80, 247, 0.14);
            vertical-align: top;
        }

        th {
            color: #d8c9ff;
            font-size: 0.78rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 700;
        }

        td {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .text-strong {
            color: #fff;
            font-weight: 700;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.65rem;
            border-radius: 999px;
            color: #d8c9ff;
            background: rgba(135, 80, 247, 0.14);
            border: 1px solid var(--line);
            font-size: 0.78rem;
        }

        .field {
            display: grid;
            gap: 0.45rem;
            margin-bottom: 1rem;
        }

        .field label {
            color: #d8c9ff;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            min-height: 3rem;
            color: #fff;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--line);
            border-radius: 0.85rem;
            padding: 0.8rem 1rem;
            outline: none;
        }

        .field textarea {
            min-height: 8rem;
            line-height: 1.6;
            resize: vertical;
        }

        .field select {
            appearance: none;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: var(--primary-2);
            box-shadow: 0 0 0 4px rgba(135, 80, 247, 0.16);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .form-grid .field--full {
            grid-column: 1 / -1;
        }

        .check-field {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: var(--muted);
            margin: 0.25rem 0 1rem;
        }

        .check-field input {
            width: 1rem;
            height: 1rem;
            accent-color: var(--primary);
        }

        .page-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .stack-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .rich-editor {
            border: 1px solid var(--line);
            border-radius: 0.85rem;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.04);
        }

        .rich-editor__toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 0.35rem;
            padding: 0.55rem;
            border-bottom: 1px solid var(--line);
            background: rgba(10, 6, 16, 0.55);
        }

        .rich-editor__toolbar button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2.25rem;
            height: 2.25rem;
            color: #d8c9ff;
            background: rgba(135, 80, 247, 0.1);
            border: 1px solid rgba(135, 80, 247, 0.22);
            border-radius: 0.55rem;
            cursor: pointer;
        }

        .rich-editor__toolbar button:hover {
            color: #fff;
            border-color: var(--primary-2);
        }

        .rich-editor__area {
            min-height: 12rem;
            padding: 1rem;
            color: #fff;
            line-height: 1.75;
            outline: none;
        }

        .rich-editor__area:focus {
            box-shadow: 0 0 0 4px rgba(135, 80, 247, 0.16) inset;
        }

        .rich-editor__area ul,
        .rich-editor__area ol {
            padding-left: 1.5rem;
            margin: 0.75rem 0;
        }

        .rich-editor__area p {
            margin: 0 0 0.75rem;
        }

        .rich-content {
            color: var(--text);
            line-height: 1.75;
        }

        .rich-content p,
        .rich-content ul,
        .rich-content ol,
        .rich-content blockquote {
            margin: 0 0 0.85rem;
        }

        .rich-content ul,
        .rich-content ol {
            padding-left: 1.5rem;
        }

        .rich-content a {
            color: #b57dff;
            text-decoration: underline;
        }

        .error {
            color: #fecaca;
            font-size: 0.82rem;
        }

        .detail-list {
            display: grid;
            gap: 1rem;
        }

        .detail-list div {
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(135, 80, 247, 0.14);
        }

        .detail-list dt {
            color: #d8c9ff;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.35rem;
            font-weight: 700;
        }

        .detail-list dd {
            color: var(--text);
            margin: 0;
            line-height: 1.7;
        }

        .pagination {
            margin-top: 1rem;
            color: var(--muted);
        }

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination a,
        .pagination span {
            color: var(--muted);
        }

        .exlon-dt {
            color: var(--muted);
        }

        .exlon-dt__controls,
        .exlon-dt__footer {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin: 0 0 1rem;
        }

        .exlon-dt__footer {
            margin: 1rem 0 0;
        }

        .exlon-dt__controls label,
        .exlon-dt__info {
            color: var(--muted);
            font-size: 0.88rem;
        }

        .exlon-dt__controls select,
        .exlon-dt__controls input {
            color: #fff;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--line);
            border-radius: 0.75rem;
            padding: 0.55rem 0.75rem;
            outline: none;
        }

        .exlon-dt__controls input:focus,
        .exlon-dt__controls select:focus {
            border-color: var(--primary-2);
            box-shadow: 0 0 0 4px rgba(135, 80, 247, 0.16);
        }

        .exlon-dt__pagination {
            display: flex;
            flex-wrap: wrap;
            gap: 0.35rem;
        }

        .exlon-dt__pagination button {
            min-width: 2.25rem;
            min-height: 2.25rem;
            color: #d8c9ff;
            border: 1px solid var(--line);
            border-radius: 0.65rem;
            background: rgba(135, 80, 247, 0.1);
            margin: 0 0.15rem;
            cursor: pointer;
        }

        .exlon-dt__pagination button.is-active,
        .exlon-dt__pagination button:hover {
            color: #fff;
            border-color: var(--primary-2);
            background: linear-gradient(135deg, var(--primary), #6b2fd4);
        }

        .exlon-dt__pagination button:disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }

        .admin-data-table th[data-sortable="true"] {
            cursor: pointer;
            user-select: none;
        }

        .admin-data-table th[data-sortable="true"]::after {
            content: '  \2195';
            color: rgba(216, 201, 255, 0.48);
            font-size: 0.75rem;
        }

        .admin-data-table th.is-sorted-asc::after {
            content: '  \2191';
            color: #b57dff;
        }

        .admin-data-table th.is-sorted-desc::after {
            content: '  \2193';
            color: #b57dff;
        }

        @media (max-width: 900px) {
            .admin-shell {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                position: static;
                height: auto;
            }

            .admin-nav {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .admin-grid--stats {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 560px) {
            .admin-topbar,
            .admin-content,
            .admin-sidebar {
                padding: 1rem;
            }

            .admin-topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .admin-nav {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    @if (auth()->check() && auth()->user()->is_admin)
        <div class="admin-shell">
            <aside class="admin-sidebar">
                <a href="{{ route('admin.dashboard') }}" class="admin-logo">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Exlon Tech">
                </a>

                <nav class="admin-nav" aria-label="Admin navigation">
                    <a href="{{ route('admin.dashboard') }}" @class(['active' => request()->routeIs('admin.dashboard')])>
                        <i class="fa-solid fa-chart-line"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.contacts.index') }}" @class(['active' => request()->routeIs('admin.contacts.*')])>
                        <i class="fa-solid fa-inbox"></i>
                        Contact Leads
                    </a>
                    <a href="{{ route('admin.jobs.index') }}" @class(['active' => request()->routeIs('admin.jobs.index', 'admin.jobs.create', 'admin.jobs.show', 'admin.jobs.edit')])>
                        <i class="fa-solid fa-briefcase"></i>
                        Jobs
                    </a>
                    <a href="{{ route('admin.jobs.archived') }}" @class(['active' => request()->routeIs('admin.jobs.archived')])>
                        <i class="fa-solid fa-box-archive"></i>
                        Older Jobs
                    </a>
                    <a href="{{ route('admin.applications.index') }}" @class(['active' => request()->routeIs('admin.applications.*')])>
                        <i class="fa-solid fa-file-lines"></i>
                        Applications
                    </a>
                    <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        View Website
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button button--ghost" style="width: 100%;">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </button>
                    </form>
                </nav>
            </aside>

            <main class="admin-main">
                <header class="admin-topbar">
                    <div>
                        <h1 class="admin-title">@yield('page_title', 'Admin')</h1>
                        <p class="admin-subtitle">@yield('page_subtitle', 'Manage Exlon Tech website activity.')</p>
                    </div>
                    <span class="badge">{{ auth()->user()->name }}</span>
                </header>

                <section class="admin-content">
                    @yield('content')
                </section>
            </main>
        </div>
    @else
        @yield('content')
    @endif
    @stack('scripts')
    <script>
        const adminAlert = Swal.mixin({
            background: '#140c1c',
            color: '#f7f3ff',
            confirmButtonColor: '#8750f7',
            cancelButtonColor: '#3b274c',
            customClass: {
                popup: 'admin-swal-popup'
            }
        });

        document.querySelectorAll('[data-confirm-delete]').forEach((form) => {
            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const result = await adminAlert.fire({
                    icon: 'warning',
                    iconColor: '#ef4444',
                    title: form.dataset.confirmTitle || 'Are you sure?',
                    text: form.dataset.confirmText || 'This action cannot be undone.',
                    showCancelButton: true,
                    confirmButtonText: form.dataset.confirmButton || 'Delete',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                });

                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        @if (session('success'))
            adminAlert.fire({
                icon: 'success',
                iconColor: '#8750f7',
                title: 'Success',
                text: @json(session('success')),
            });
        @endif

        @if (session('error'))
            adminAlert.fire({
                icon: 'error',
                iconColor: '#ef4444',
                title: 'Error',
                text: @json(session('error')),
            });
        @endif

        document.querySelectorAll('.admin-data-table').forEach((table) => {
            const tbody = table.tBodies[0];
            if (!tbody) {
                return;
            }

            const allRows = Array.from(tbody.rows);
            let filteredRows = [...allRows];
            let currentPage = 1;
            let pageLength = Number(table.dataset.pageLength || 10);
            let sortIndex = null;
            let sortDirection = 'asc';

            const wrapper = document.createElement('div');
            wrapper.className = 'exlon-dt';
            table.parentNode.insertBefore(wrapper, table);
            wrapper.appendChild(table);

            const controls = document.createElement('div');
            controls.className = 'exlon-dt__controls';
            controls.innerHTML = `
                <label>Show
                    <select data-dt-length>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="-1">All</option>
                    </select>
                    rows
                </label>
                <label>Search
                    <input type="search" data-dt-search placeholder="Type to filter">
                </label>
            `;
            wrapper.insertBefore(controls, table);

            const footer = document.createElement('div');
            footer.className = 'exlon-dt__footer';
            footer.innerHTML = '<div class="exlon-dt__info"></div><div class="exlon-dt__pagination"></div>';
            wrapper.appendChild(footer);

            const lengthSelect = controls.querySelector('[data-dt-length]');
            const searchInput = controls.querySelector('[data-dt-search]');
            const info = footer.querySelector('.exlon-dt__info');
            const pagination = footer.querySelector('.exlon-dt__pagination');
            lengthSelect.value = String(pageLength);

            table.querySelectorAll('thead th').forEach((th, index) => {
                if (!th.classList.contains('no-sort')) {
                    th.dataset.sortable = 'true';
                    th.addEventListener('click', () => {
                        sortDirection = sortIndex === index && sortDirection === 'asc' ? 'desc' : 'asc';
                        sortIndex = index;
                        currentPage = 1;
                        render();
                    });
                }
            });

            const rowText = (row) => row.textContent.toLowerCase();

            const applyFilter = () => {
                const term = searchInput.value.trim().toLowerCase();
                filteredRows = term ? allRows.filter((row) => rowText(row).includes(term)) : [...allRows];

                if (sortIndex !== null) {
                    filteredRows.sort((a, b) => {
                        const aText = a.cells[sortIndex]?.textContent.trim().toLowerCase() || '';
                        const bText = b.cells[sortIndex]?.textContent.trim().toLowerCase() || '';
                        const aNumber = Number(aText.replace(/[^0-9.-]/g, ''));
                        const bNumber = Number(bText.replace(/[^0-9.-]/g, ''));
                        const bothNumeric = aText !== '' && bText !== '' && !Number.isNaN(aNumber) && !Number.isNaN(bNumber);
                        const result = bothNumeric ? aNumber - bNumber : aText.localeCompare(bText);
                        return sortDirection === 'asc' ? result : -result;
                    });
                }
            };

            const renderPagination = (totalPages) => {
                pagination.innerHTML = '';

                const makeButton = (label, page, disabled = false, active = false) => {
                    const button = document.createElement('button');
                    button.type = 'button';
                    button.textContent = label;
                    button.disabled = disabled;
                    button.classList.toggle('is-active', active);
                    button.addEventListener('click', () => {
                        currentPage = page;
                        render();
                    });
                    pagination.appendChild(button);
                };

                makeButton('Prev', Math.max(1, currentPage - 1), currentPage === 1);

                for (let page = 1; page <= totalPages; page += 1) {
                    if (totalPages > 7 && page !== 1 && page !== totalPages && Math.abs(page - currentPage) > 1) {
                        if (page === 2 || page === totalPages - 1) {
                            const ellipsis = document.createElement('span');
                            ellipsis.textContent = '...';
                            ellipsis.style.color = 'var(--muted)';
                            ellipsis.style.padding = '0.45rem 0.25rem';
                            pagination.appendChild(ellipsis);
                        }
                        continue;
                    }
                    makeButton(String(page), page, false, page === currentPage);
                }

                makeButton('Next', Math.min(totalPages, currentPage + 1), currentPage === totalPages);
            };

            const render = () => {
                applyFilter();

                table.querySelectorAll('thead th').forEach((th, index) => {
                    th.classList.toggle('is-sorted-asc', sortIndex === index && sortDirection === 'asc');
                    th.classList.toggle('is-sorted-desc', sortIndex === index && sortDirection === 'desc');
                });

                const total = filteredRows.length;
                const effectiveLength = pageLength === -1 ? Math.max(total, 1) : pageLength;
                const totalPages = Math.max(Math.ceil(total / effectiveLength), 1);
                currentPage = Math.min(currentPage, totalPages);
                const start = total === 0 ? 0 : (currentPage - 1) * effectiveLength;
                const end = pageLength === -1 ? total : Math.min(start + effectiveLength, total);

                allRows.forEach((row) => {
                    row.style.display = 'none';
                });

                filteredRows.slice(start, end).forEach((row) => {
                    row.style.display = '';
                });

                info.textContent = total === 0
                    ? 'Showing 0 records'
                    : `Showing ${start + 1} to ${end} of ${total} records`;

                renderPagination(totalPages);
            };

            lengthSelect.addEventListener('change', () => {
                pageLength = Number(lengthSelect.value);
                currentPage = 1;
                render();
            });

            searchInput.addEventListener('input', () => {
                currentPage = 1;
                render();
            });

            render();
        });

        document.querySelectorAll('[data-rich-editor]').forEach((editor) => {
            const area = editor.querySelector('[data-rich-area]');
            const input = editor.querySelector('[data-rich-input]');
            const toolbar = editor.querySelector('[data-rich-toolbar]');

            const sync = () => {
                input.value = area.innerHTML.trim();
            };

            toolbar?.addEventListener('click', (event) => {
                const button = event.target.closest('button[data-command]');
                if (!button) {
                    return;
                }

                event.preventDefault();
                area.focus();

                if (button.dataset.command === 'createLink') {
                    const url = window.prompt('Enter link URL');
                    if (url) {
                        document.execCommand('createLink', false, url);
                    }
                } else {
                    document.execCommand(button.dataset.command, false, null);
                }

                sync();
            });

            area.addEventListener('input', sync);
            area.addEventListener('blur', sync);
            area.closest('form')?.addEventListener('submit', sync);
            sync();
        });
    </script>
</body>

</html>
