<?php

class Student_Model extends CI_Model {

    var $column_search = array('students.admission_no','students.first_name','students.second_name','students.last_name','courses.course_code','courses.course_name','faculties.faculty_name','departments.department_name'); //set column field database for datatable searchable
    var $order = array('students.student_id' => 'desc'); // default order

    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    #Students Start
    public function students() {
        $this->db->select ('
                students.*,
                courses.course_code, courses.course_name,
                faculties.faculty_name,
                departments.department_name
            FROM students
        ', FALSE);
        $this->db->join("courses", "courses.course_id = students.course_id");
        $this->db->join("faculties", "faculties.faculty_id = students.faculty_id",'left');
        $this->db->join("departments", "departments.department_id = students.department_id",'left');
        $this->db->where(" students.active = 1 ");
        $result = $this->db->get();
        return $result->result();
    }
    public function all_students() {
        $this->db->select ('
                students.*,
                courses.course_code, courses.course_name,
                faculties.faculty_name,
                departments.department_name
            FROM students
        ', FALSE);
        $this->db->join("courses", "courses.course_id = students.course_id");
        $this->db->join("faculties", "faculties.faculty_id = students.faculty_id",'left');
        $this->db->join("departments", "departments.department_id = students.department_id",'left');
        // $this->db->where(" students.active = 1 ");
        $result = $this->db->get();
        return $result->result();
    }

    public function student_datatable($getdata) {
        $i = 0;

        $this->db->select ('
            students.*,

            courses.course_code, courses.course_name,
            faculties.faculty_name,
            departments.department_name

            FROM students
        ', FALSE);
        $this->db->join("courses", "courses.course_id = students.course_id");
        $this->db->join("faculties", "faculties.faculty_id = students.faculty_id",'left');
        $this->db->join("departments", "departments.department_id = students.department_id",'left');
        $this->db->where(" students.active = 1 ");

        foreach ($this->column_search as $item) { // loop column 

			if ($getdata['search']['value']) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $getdata['search']['value']);
				} else {
					$this->db->or_like($item, $getdata['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($getdata['order'])) // here order processing
		{
			$this->db->order_by($this->column_search[$getdata['order']['0']['column']], $getdata['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}


        if($getdata['length'] != -1) {
            $this->db->limit($getdata['length'], $getdata['start']);
        }
        $result = $this->db->get();
        return $result->result();
    }
    public function student_count() {
        return $this->db->where(" students.active = 1 ")
                        ->get('students')->num_rows();
    }

    public function student_datatable_inactive($getdata) {
        $i = 0;

        $this->db->select ('
            students.*,

            courses.course_code, courses.course_name,
            faculties.faculty_name,
            departments.department_name

            FROM students
        ', FALSE);
        $this->db->join("courses", "courses.course_id = students.course_id");
        $this->db->join("faculties", "faculties.faculty_id = students.faculty_id",'left');
        $this->db->join("departments", "departments.department_id = students.department_id",'left');
        $this->db->where("students.active = 0 ");

        foreach ($this->column_search as $item) { // loop column 

			if ($getdata['search']['value']) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $getdata['search']['value']);
				} else {
					$this->db->or_like($item, $getdata['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($getdata['order'])) // here order processing
		{
			$this->db->order_by($this->column_search[$getdata['order']['0']['column']], $getdata['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}

        if($getdata['length'] != -1) {
            $this->db->limit($getdata['length'], $getdata['start']);
        }
        $result = $this->db->get();
        return $result->result();
    }
    public function student_count_inactive() {
        return $this->db->where("active = 0 ")->get('students')->num_rows();
    }

    public function students2() {
        $this->db->select ('
            students.*,

            courses.course_code, courses.course_name,
            faculties.faculty_name,
            departments.department_name

            FROM students
        ', FALSE);
        $this->db->join("courses", "courses.course_id = students.course_id");
        $this->db->join("faculties", "faculties.faculty_id = students.faculty_id",'left');
        $this->db->join("departments", "departments.department_id = students.department_id",'left');
        $this->db->where("students.active = 0 ");
        $result = $this->db->get();
        return $result->result();
    }

    public function students_profile($id) {
        return $this->db->select (' a.*,
                        b.course_code, b.course_name,
                        c.faculty_name,
                        d.department_name
                    ')
                    ->from('students as a')
                    ->join("courses as b", "b.course_id = a.course_id")
                    ->join("faculties as c", "c.faculty_id = a.faculty_id","left")
                    ->join("departments as d", "d.department_id = a.department_id","left")
                    ->where('a.student_id',$id)
                    ->get()->row();
    }

    public function this_student ($id) {
        return $this->db->select (' a.*,
                        b.course_code, b.course_name,
                        c.faculty_name,
                        d.department_name
                    ')
                    ->from('students as a')
                    ->join("courses as b", "b.course_id = a.course_id")
                    ->join("faculties as c", "c.faculty_id = a.faculty_id","left")
                    ->join("departments as d", "d.department_id = a.department_id","left")
                    ->where('a.student_id',$id)
                    ->get()->row();
    }

    public function get_org_students($orgID) {
        $this->db->select ('
            students.*,

            student_type.student_type_name

            FROM students
        ', FALSE);
        $this->db->join("student_type", "student_type.student_type_id = students.student_type_id");
        $this->db->where("students.org_id", $orgID);
        $result = $this->db->get();
        return $result->result();
    }

    public function students_classes($id) {
        $this->db->select ('            
            student_classes.student_class_id, student_classes.student_id, student_classes.class_stream_id, student_classes.from_date,
            student_classes.to_date, student_classes.active, student_classes.date_modified, student_classes.time_stamp,

            students.first_name, students.second_name, students.last_name, students.admission_no, students.dob,

            class_streams.class_id, class_streams.stream_id,

            streams.stream_name,
            class.class_name

            FROM student_classes
        ', FALSE);
        $this->db->join("students", "students.student_id = student_classes.student_id");
        $this->db->join("class_streams", "class_streams.class_stream_id = student_classes.class_stream_id");
        $this->db->join("streams", "streams.stream_id = class_streams.stream_id");
        $this->db->join("class", "class.class_id = class_streams.class_id");
        $this->db->where("students.student_id", $id);
        $result = $this->db->get();
        return $result->result();
    }
    #Students End

    // Filter start
    public function filter1($studenttypeid, $classid, $streamid) {
        
        if( $studenttypeid != '' && $classid != '' && $streamid != '' ) {
            // filter by student_type & class & class stream
            $condition = array (
                'a.student_type_id' => $studenttypeid,
                'c.class_id' => $classid,
                'c.stream_id' => $streamid
            );
        }
        if( $studenttypeid != '' && $classid == '' && $streamid == '' ) {
            // filter by student_type only
            $condition = array (
                'a.student_type_id' => $studenttypeid
            );
        }
        if( $classid != '' && $studenttypeid == '' && $streamid == '' ) {
            // filter by class only
            $condition = array (
                'c.class_id' => $classid
            );
        }
        if( $streamid != '' && $studenttypeid == '' && $streamid == '' ) {
            // filter by class stream only
            $condition = array (
                'c.stream_id' => $streamid
            );
        }

        if( $studenttypeid != '' && $classid != '' && $streamid == '' ) {
            // filter by student_type & class
            $condition = array (
                'a.student_type_id' => $studenttypeid,
                'c.class_id' => $classid
            );
        }
        if( $studenttypeid != '' && $classid == '' && $streamid != '' ) {
            // filter by student_type & class stream
            $condition = array (
                'a.student_type_id' => $studenttypeid,
                'c.stream_id' => $streamid
            );
        }
        if( $classid != '' && $studenttypeid == '' && $streamid != '' ) {
            // filter by class & class stream
            $condition = array (
                'c.class_id' => $classid,
                'c.stream_id' => $streamid
            );
        }

        return $this->db->select (' a.*,
                        b.student_type_name,
                        c.class_id, c.stream_id,
                        d.class_name,
                        e.stream_name
                        ')
                ->from('students as a')
                ->join("student_type as b", "b.student_type_id = a.student_type_id")
                ->join("class_streams as c", "c.class_stream_id = a.class_stream_id",'left')
                ->join("class as d", "d.class_id = c.class_id",'left')
                ->join("streams as e", "e.stream_id = c.stream_id",'left')
                ->where($condition)
                ->where('a.active',1)
                ->get()->result();
    }
    public function filter2($studenttypeid, $classid, $streamid) {
        
        if( $studenttypeid != '' && $classid != '' && $streamid != '' ) {
            // filter by student_type & class & class stream
            $condition = array (
                'a.student_type_id' => $studenttypeid,
                'c.class_id' => $classid,
                'c.stream_id' => $streamid
            );
        }
        if( $studenttypeid != '' && $classid == '' && $streamid == '' ) {
            // filter by student_type only
            $condition = array (
                'a.student_type_id' => $studenttypeid
            );
        }
        if( $classid != '' && $studenttypeid == '' && $streamid == '' ) {
            // filter by class only
            $condition = array (
                'c.class_id' => $classid
            );
        }
        if( $streamid != '' && $studenttypeid == '' && $streamid == '' ) {
            // filter by class stream only
            $condition = array (
                'c.stream_id' => $streamid
            );
        }

        if( $studenttypeid != '' && $classid != '' && $streamid == '' ) {
            // filter by student_type & class
            $condition = array (
                'a.student_type_id' => $studenttypeid,
                'c.class_id' => $classid
            );
        }
        if( $studenttypeid != '' && $classid == '' && $streamid != '' ) {
            // filter by student_type & class stream
            $condition = array (
                'a.student_type_id' => $studenttypeid,
                'c.stream_id' => $streamid
            );
        }
        if( $classid != '' && $studenttypeid == '' && $streamid != '' ) {
            // filter by class & class stream
            $condition = array (
                'c.class_id' => $classid,
                'c.stream_id' => $streamid
            );
        }

        return $this->db->select (' a.*,
                        b.student_type_name,
                        c.class_id, c.stream_id,
                        d.class_name,
                        e.stream_name
                        ')
                ->from('students as a')
                ->join("student_type as b", "b.student_type_id = a.student_type_id")
                ->join("class_streams as c", "c.class_stream_id = a.class_stream_id",'left')
                ->join("class as d", "d.class_id = c.class_id",'left')
                ->join("streams as e", "e.stream_id = c.stream_id",'left')
                ->where($condition)
                ->where('a.active',1)
                ->order_by('admission_no ASC')
                ->get()->result();
    }
    public function filter3() {
        return $this->db->select (' a.*,
                        b.student_type_name,
                        c.class_id, c.stream_id,
                        d.class_name,
                        e.stream_name
                        ')
                ->from('students as a')
                ->join("student_type as b", "b.student_type_id = a.student_type_id")
                ->join("class_streams as c", "c.class_stream_id = a.class_stream_id",'left')
                ->join("class as d", "d.class_id = c.class_id",'left')
                ->join("streams as e", "e.stream_id = c.stream_id",'left')
                ->where('a.active',1)
                ->get()->result();
    }

    public function filter4() {
        return $this->db->select (' a.*,
                        b.student_type_name,
                        c.class_id, c.stream_id,
                        d.class_name,
                        e.stream_name
                        ')
                ->from('students as a')
                ->join("student_type as b", "b.student_type_id = a.student_type_id")
                ->join("class_streams as c", "c.class_stream_id = a.class_stream_id",'left')
                ->join("class as d", "d.class_id = c.class_id",'left')
                ->join("streams as e", "e.stream_id = c.stream_id",'left')
                ->get()->result();
    }

    public function filter5() {
        return $this->db->select (' a.*,
                        b.student_type_name,
                        c.class_id, c.stream_id,
                        d.class_name,
                        e.stream_name
                        ')
                ->from('students as a')
                ->join("student_type as b", "b.student_type_id = a.student_type_id")
                ->join("class_streams as c", "c.class_stream_id = a.class_stream_id",'left')
                ->join("class as d", "d.class_id = c.class_id",'left')
                ->join("streams as e", "e.stream_id = c.stream_id",'left')
                ->where("a.active = 0 OR a.student_type_id = '' OR a.class_stream_id IS NULL ")
                ->get()->result();
    }
    // Filter end




}




