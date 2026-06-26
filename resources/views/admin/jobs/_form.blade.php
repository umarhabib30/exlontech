@csrf

<div class="form-grid">
    <div class="field">
        <label for="title">Job Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', $job->title) }}" required>
        @error('title') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="type">Job Type</label>
        <select id="type" name="type" required>
            @foreach (['Full Time', 'Part Time', 'Contract', 'Internship', 'Remote'] as $type)
                <option value="{{ $type }}" @selected(old('type', $job->type) === $type)>{{ $type }}</option>
            @endforeach
        </select>
        @error('type') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="location">Location</label>
        <input id="location" name="location" type="text" value="{{ old('location', $job->location) }}" placeholder="Sargodha, Pakistan / Remote" required>
        @error('location') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="experience_level">Experience Level</label>
        <input id="experience_level" name="experience_level" type="text" value="{{ old('experience_level', $job->experience_level) }}" placeholder="Fresh, 1-2 years, Senior">
        @error('experience_level') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="salary_range">Salary Range</label>
        <input id="salary_range" name="salary_range" type="text" value="{{ old('salary_range', $job->salary_range) }}" placeholder="Optional">
        @error('salary_range') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="deadline">Application Deadline</label>
        <input id="deadline" name="deadline" type="date" value="{{ old('deadline', optional($job->deadline)->format('Y-m-d')) }}">
        @error('deadline') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field field--full">
        <label for="description">Job Description</label>
        @include('admin.jobs.partials.rich-editor', [
            'name' => 'description',
            'value' => old('description', $job->description),
        ])
        @error('description') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field field--full">
        <label for="responsibilities">Responsibilities</label>
        @include('admin.jobs.partials.rich-editor', [
            'name' => 'responsibilities',
            'value' => old('responsibilities', $job->responsibilities),
        ])
        @error('responsibilities') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field field--full">
        <label for="requirements">Requirements</label>
        @include('admin.jobs.partials.rich-editor', [
            'name' => 'requirements',
            'value' => old('requirements', $job->requirements),
        ])
        @error('requirements') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field field--full">
        <label for="benefits">Benefits</label>
        @include('admin.jobs.partials.rich-editor', [
            'name' => 'benefits',
            'value' => old('benefits', $job->benefits),
        ])
        @error('benefits') <span class="error">{{ $message }}</span> @enderror
    </div>
</div>

<label class="check-field">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $job->is_active))>
    Publish this job on the careers page
</label>

<div class="stack-actions">
    <button type="submit" class="button">
        <i class="fa-solid fa-floppy-disk"></i>
        Save Job
    </button>
    <a href="{{ route('admin.jobs.index') }}" class="button button--ghost">Cancel</a>
</div>
