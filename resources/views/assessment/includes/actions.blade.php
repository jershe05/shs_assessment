
    <x-utils.view-button :href="route('admin.strand.show', ['strand' => $model])" />
    <x-utils.edit-button :href="route('admin.track.update', $model)" />
    <x-utils.delete-button :href="route('admin.auth.role.destroy', $model)" />

