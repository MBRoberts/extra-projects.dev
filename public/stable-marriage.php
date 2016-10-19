<?php

	$studentPrefers = [

		'student1'  => ['mentor1', 'mentor5', 'mentor3', 'mentor9', 'mentor10', 'mentor4', 'mentor6', 'mentor2', 'mentor8', 'mentor7'],

		'student2'  => ['mentor3', 'mentor8', 'mentor1', 'mentor4', 'mentor5', 'mentor6', 'mentor2', 'mentor10', 'mentor9', 'mentor7'],

		'student3'  => ['mentor8', 'mentor5', 'mentor1', 'mentor4', 'mentor2', 'mentor6', 'mentor9', 'mentor7', 'mentor3', 'mentor10'],

		'student4'  => ['mentor9', 'mentor6', 'mentor4', 'mentor7', 'mentor8', 'mentor5', 'mentor10', 'mentor2', 'mentor3', 'mentor1'],

		'student5'   => ['mentor10', 'mentor4', 'mentor2', 'mentor3', 'mentor6', 'mentor5', 'mentor1', 'mentor9', 'mentor8', 'mentor7'],

		'student6' => ['mentor2', 'mentor1', 'mentor4', 'mentor7', 'mentor5', 'mentor9', 'mentor3', 'mentor10', 'mentor8', 'mentor6'],

		'student7'  => ['mentor7', 'mentor5', 'mentor9', 'mentor2', 'mentor3', 'mentor1', 'mentor4', 'mentor8', 'mentor10', 'mentor6'],

		'student8'  => ['mentor1', 'mentor5', 'mentor8', 'mentor6', 'mentor9', 'mentor3', 'mentor10', 'mentor2', 'mentor7', 'mentor4'],

		'student9'  => ['mentor8', 'mentor3', 'mentor4', 'mentor7', 'mentor2', 'mentor1', 'mentor6', 'mentor9', 'mentor10', 'mentor5'],

		'student10'  => ['mentor1', 'mentor6', 'mentor10', 'mentor7', 'mentor5', 'mentor2', 'mentor4', 'mentor3', 'mentor9', 'mentor8']
	];

	$mentorPrefers = [

		'mentor1'  => ['student2', 'student6', 'student10', 'student7', 'student9', 'student1', 'student4', 'student5', 'student3', 'student8'],

		'mentor2'  => ['student2', 'student1', 'student3', 'student6', 'student7', 'student4', 'student9', 'student5', 'student10', 'student8'],

		'mentor3' => ['student6', 'student2', 'student5', 'student7', 'student8', 'student3', 'student9', 'student1', 'student4', 'student10'],

		'mentor4'  => ['student6', 'student10', 'student3', 'student1', 'student9', 'student8', 'student7', 'student4', 'student2', 'student5'],

		'mentor5'  => ['student10', 'student8', 'student6', 'student4', 'student1', 'student7', 'student3', 'student5', 'student9', 'student2'],

		'mentor6'  => ['student2', 'student1', 'student5', 'student9', 'student10', 'student4', 'student6', 'student7', 'student3', 'student8'],

		'mentor7'  => ['student10', 'student7', 'student8', 'student6', 'student2', 'student1', 'student3', 'student5', 'student4', 'student9'],

		'mentor8' => ['student7', 'student10', 'student2', 'student1', 'student9', 'student4', 'student8', 'student5', 'student3', 'student6'],

		'mentor9'  => ['student9', 'student3', 'student8', 'student7', 'student6', 'student2', 'student1', 'student5', 'student10', 'student4'],

		'mentor10'  => ['student5', 'student8', 'student7', 'student1', 'student2', 'student10', 'student3', 'student9', 'student6', 'student4']
	];
	 
	function check($matched)
	{
		global $studentPrefers, $mentorPrefers;
		$inverseMatched = array_combine(array_values($matched), array_keys($matched));
		
		foreach ($matched as $mentorKey => $studentChosen) {
			
			$mentorLikes = $mentorPrefers[$mentorKey];
			$mentorLikesBetter = array_slice($mentorLikes, 0, array_search($studentChosen, $mentorLikes));
			$studentLikes = $studentPrefers[$studentChosen];
			$studentLikesBetter = array_slice($studentLikes, 0, array_search($mentorKey, $studentLikes));
	 
			foreach ($mentorLikesBetter as $student) {
				
				$studentsMentor = $inverseMatched[$student];
				$studentlikes = $studentPrefers[$student];
				if (array_search($studentsMentor, $studentlikes) > array_search($mentorKey, $studentlikes)) {
					
					echo "{$mentorKey} and {$student} like each other better than their present partners: {$studentChosen} and {$studentsMentor}, respectively" . PHP_EOL;
					return false;
				}
			}
			
			foreach ($studentLikesBetter as $mentor) {
				
				$mentorsStudent = $matched[$mentor];
				$mentorlikes = $mentorPrefers[$mentor];

				if (array_search($mentorsStudent,$mentorlikes) > array_search($studentChosen,$mentorlikes)) {
					
					echo "\n{$studentChosen} and {$mentor} prefer each other better than their present matches: {$mentorKey} and {$mentorsStudent}, respectively" . PHP_EOL;
					return false;
				}
			}
		}
		return true;
	}
	 
	function matchMaker($matched)
	{
		global $studentPrefers, $mentorPrefers;
	 
		$students = array_keys($studentPrefers);
		$mentors = array_keys($mentorPrefers);
		sort($students);
		sort($mentors);
	 
		$studentsfree = $students;
		$matched  = [];
		$studentPrefers2 = json_decode(json_encode($studentPrefers), true);
		$mentorPrefers2 = json_decode(json_encode($mentorPrefers), true);
	 
		while (count($studentsfree)) {

			$student = array_shift($studentsfree);
			$studentslist = &$studentPrefers2[$student];
			$mentor = array_shift($studentslist);
			$possibleMatch = (isset($matched[$mentor])) ? $matched[$mentor] : false;

			if (!$possibleMatch) {
				
				// Mentor's free
				$matched[$mentor] = $student;
				echo "\t- {$student} and {$mentor}". PHP_EOL;

			} else {
				
				// The student proposes a match to a mentor!
				$mentorslist = $mentorPrefers2[$mentor];

				if (array_search($possibleMatch, $mentorslist) > array_search($student,$mentorslist)) {
					
					// Mentor prefers new student
					$matched[$mentor] = $student;
					echo "\t- {$mentor} switched from {$possibleMatch} to {$student}" . PHP_EOL;
					
					if ($studentPrefers2[$possibleMatch]) {
						
						// Student has more mentors to try
						$studentsfree[] = $possibleMatch;
					}
				} else {
					
					// Mentor prefers previous student
					if (count($studentslist)) {
						
						// Look again
						$studentsfree[] = $student;
					}
				}
			}
		}
		return $matched;
	}
	 
	$matched  = array();
	echo "\nMatching Process:" . PHP_EOL;
	$matched = matchMaker($matched);
	 
	echo "\nFinal Matches:" . PHP_EOL;
	ksort($matched);

	foreach ($matched as $student => $mentor) {
		echo "\t- {$student} is matched to {$mentor}" . PHP_EOL;
	}

	$success = check($matched);
	echo "\n\tMatch stability check ". (($success) ? 'PASSED' : 'FAILED' ) . PHP_EOL;
	 
	echo "\nSwapping two matches to introduce an error:" . PHP_EOL;

	$mentors = array_keys($mentorPrefers);
	ksort($mentors);

	list($matched[$mentors[0]], $matched[$mentors[1]]) = array($matched[$mentors[1]], $matched[$mentors[0]]);

	echo "\nFinal Matches:" . PHP_EOL;
	ksort($matched);

	foreach ($matched as $student => $mentor) {
		echo "\t- {$student} is matched to {$mentor}" . PHP_EOL;
	}

	echo "\n\tMatch stability check " . ((check($matched)) ? 'PASSED' : 'FAILED') . PHP_EOL . PHP_EOL;



