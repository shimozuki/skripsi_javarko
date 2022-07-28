<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '17',
                'title'      => 'client_management_setting_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '18',
                'title'      => 'currency_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '19',
                'title'      => 'currency_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '20',
                'title'      => 'currency_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '21',
                'title'      => 'currency_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '22',
                'title'      => 'currency_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '23',
                'title'      => 'transaction_type_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '24',
                'title'      => 'transaction_type_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '25',
                'title'      => 'transaction_type_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '26',
                'title'      => 'transaction_type_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '27',
                'title'      => 'transaction_type_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '28',
                'title'      => 'income_source_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '29',
                'title'      => 'income_source_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '30',
                'title'      => 'income_source_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '31',
                'title'      => 'income_source_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '32',
                'title'      => 'income_source_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '33',
                'title'      => 'client_status_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '34',
                'title'      => 'client_status_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '35',
                'title'      => 'client_status_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '36',
                'title'      => 'client_status_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '37',
                'title'      => 'client_status_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '38',
                'title'      => 'project_status_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '39',
                'title'      => 'project_status_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '40',
                'title'      => 'project_status_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '41',
                'title'      => 'project_status_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '42',
                'title'      => 'project_status_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '43',
                'title'      => 'client_management_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '44',
                'title'      => 'client_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '45',
                'title'      => 'client_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '46',
                'title'      => 'client_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '47',
                'title'      => 'client_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '48',
                'title'      => 'client_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '49',
                'title'      => 'project_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '50',
                'title'      => 'project_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '51',
                'title'      => 'project_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '52',
                'title'      => 'project_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '53',
                'title'      => 'project_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '54',
                'title'      => 'note_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '55',
                'title'      => 'note_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '56',
                'title'      => 'note_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '57',
                'title'      => 'note_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '58',
                'title'      => 'note_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '59',
                'title'      => 'document_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '60',
                'title'      => 'document_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '61',
                'title'      => 'document_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '62',
                'title'      => 'document_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '63',
                'title'      => 'document_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '64',
                'title'      => 'transaction_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '65',
                'title'      => 'transaction_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '66',
                'title'      => 'transaction_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '67',
                'title'      => 'transaction_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '68',
                'title'      => 'transaction_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '69',
                'title'      => 'client_report_create',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '70',
                'title'      => 'client_report_edit',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '71',
                'title'      => 'client_report_show',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '72',
                'title'      => 'client_report_delete',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
            [
                'id'         => '73',
                'title'      => 'client_report_access',
                'created_at' => '2022-07-20 06:10:05',
                'updated_at' => '2022-07-20 06:10:05',
            ],
        ];

        Permission::insert($permissions);
    }
}
