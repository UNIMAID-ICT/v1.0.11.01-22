<div>
    @can('isSuperAdmin')
        @include('navigation-bar.superAdminNAv')
    @endcan

    @can('isAdmin')
        @include('navigation-bar.adminNav')
    @endcan

    @can('isViceChancellor')
        @include('navigation-bar.vcNav')
    @endcan

    @can('isRegistrar')

    @endcan

    @can('isBursar')

    @endcan

    @can('isCourseSystem')

    @endcan

    @can('isDeanStudentAffair')

    @endcan

    @can('isDean')

        @include('navigation-bar.deanNav')

    @endcan

    @can('isHeadofDepartment')
        @include('navigation-bar.hodNav')
    @endcan

    @can('isDepartmentCoordinator')
        @include('navigation-bar.deptCordinatorNav')
    @endcan

    @can('isStaff')
        @include('navigation-bar.lectureNav')
    @endcan

    @can('isStudent')
        @include('navigation-bar.studentNav')
    @endcan
</div>
