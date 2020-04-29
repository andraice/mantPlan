<li class="header">ADMINISTRATION</li>
@hasrole('admin')
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
</li>
<li class="treeview {{ Request::is('companyTypes*') || Request::is('typeServices*') || Request::is('equipment*s') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-cubes"></i><span>Parameters</span></a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('companyTypes*') ? 'active' : '' }}">
            <a href="{!! route('companyTypes.index') !!}"><i class="fa fa-bars"></i><span>Company Types</span></a>
        </li>
        <li class="{{ Request::is('equipmentTypes*') ? 'active' : '' }}">
            <a href="{!! route('equipmentTypes.index') !!}"><i class="fa fa-bars"></i><span>Equipment Types</span></a>
        </li>

        <li class="{{ Request::is('equipmentModels*') ? 'active' : '' }}">
            <a href="{!! route('equipmentModels.index') !!}"><i class="fa fa-bars"></i><span>Equipment Models</span></a>
        </li>

        <li class="{{ Request::is('equipmentBrands*') ? 'active' : '' }}">
            <a href="{!! route('equipmentBrands.index') !!}"><i class="fa fa-bars"></i><span>Equipment Brands</span></a>
        </li>
        <li class="{{ Request::is('typeServices*') ? 'active' : '' }}">
            <a href="{{ route('typeServices.index') }}"><i class="fa fa-edit"></i><span>Type Services</span></a>
        </li>
    </ul>
</li>
@endhasrole
<li class="header">MAIN NAVIGATION</li>
<li class="treeview {{ Request::is('company') || Request::is('company/create') ? 'active' : '' }}">
    <a href="{!! route('company.index') !!}"><i class="fa fa-industry"></i><span>Company</span></a>
    <ul class="treeview-menu">
        <li class=" {{ Request::is('company') ? 'active' : '' }}">
            <a href="{!! route('company.index') !!}"><i class="fa fa-list"></i><span>List of Companies</span></a>
        </li>
        <li class=" {{ Request::is('company/create') ? 'active' : '' }}">
            <a href="{!! route('company.create') !!}"><i class="fa fa-plus"></i><span>Add Company</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('equipment') || Request::is('equipment/create') ? 'active' : '' }}">
    <a href="{!! route('equipment.index') !!}"><i class="fa fa-cubes"></i><span>Equipment</span></a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('equipment') ? 'active' : '' }}">
            <a href="{!! route('equipment.index') !!}"><i class="fa fa-list"></i><span>List of equipments</span></a>
        </li>
        <li class="{{ Request::is('equipment/create') ? 'active' : '' }}">
            <a href="{!! route('equipment.create') !!}"><i class="fa fa-plus"></i><span>Add equipment</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('serviceOrders*') ? 'active' : '' }}">
    <a href="{!! route('serviceOrders.index') !!}"><i class="fa fa-wrench"></i><span>Services</span></a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('serviceOrders*') ? 'active' : '' }}">
            <a href="{!! route('serviceOrders.index') !!}"><i class="fa fa-edit"></i><span>Service Orders</span></a>
        </li>

        <li class="{{ Request::is('equipmentParameters*') ? 'active' : '' }}">
            <a href="{!! route('equipmentParameters.index') !!}"><i class="fa fa-edit"></i><span>Equipment
                    Parameters</span></a>
        </li>
    </ul>
</li>

@hasrole('admin')
<li class="treeview {{ Request::is('task*') ? 'active' : '' }}">
    <a href="{!! route('taskGroups.index') !!}"><i class="fa fa-tasks"></i><span>Tasks</span></a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('taskGroups*') ? 'active' : '' }}">
            <a href="{{ route('taskGroups.index') }}"><i class="fa fa-list"></i><span>List of Task Groups</span></a>
        </li>
        <li class="{{ Request::is('taskGroups*') ? 'active' : '' }}">
            <a href="{{ route('taskGroups.create') }}"><i class="fa fa-plus"></i><span>Add Task Group</span></a>
        </li>
    </ul>
</li>
@endhasrole
