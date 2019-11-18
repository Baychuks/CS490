<?php
header("Content-Type: application/json");
?>
{
    "student_examid": "a27398e6-f519-11e9-89cd-0050569dd159",
    "questions": [
        {
            "student_questionid": "a2744ab5-f519-11e9-89cd-0050569dd159",
            "pointvalue": "50",
            "ucid": "aar73",
            "pointsearned": "26",
            "answer": "def list_arra(a) for x in range(len(a)): print a[x];",
            "instructions": "Write a function named double it that takes an argument n and returns twice the value",
            "comment": "this is ok",
            "deductions": [
                {
                    "id": "32b802c6-0897-11ea-89cd-0050569dd159",
                    "message": "Didn't use the correct method name",
                    "pointsRemoved": "-5",
                    "student_questionsid": "a2744ab5-f519-11e9-89cd-0050569dd159"
                },
                {
                    "id": "32b8ee4b-0897-11ea-89cd-0050569dd159",
                    "message": "Missing semicolon at the beginning of code",
                    "pointsRemoved": "-3",
                    "student_questionsid": "a2744ab5-f519-11e9-89cd-0050569dd159"
                },
                {
                    "id": "32b983bf-0897-11ea-89cd-0050569dd159",
                    "message": "Result 1 didn't match",
                    "pointsRemoved": "-22",
                    "student_questionsid": "a2744ab5-f519-11e9-89cd-0050569dd159"
                },
                {
                    "id": "32b9e7aa-0897-11ea-89cd-0050569dd159",
                    "message": "Result 2 didn't match",
                    "pointsRemoved": "-44",
                    "student_questionsid": "a2744ab5-f519-11e9-89cd-0050569dd159"
                }
            ]
        },
        {
            "student_questionid": "a274fa05-f519-11e9-89cd-0050569dd159",
            "pointvalue": "25",
            "ucid": "aar73",
            "pointsearned": "25",
            "answer": "def string_reverse(str1):\r\n    rstr1 = ''\r\n    index = len(str1)\r\n    while index &gt; 0:\r\n        rstr1 += str1[ index - 1 ]\r\n        index = index - 1\r\n    return rstr1",
            "instructions": "Write a function with the name string_reverse that reverses any input string.",
            "comment": "",
            "deductions": []
        },
        {
            "student_questionid": "a2757c75-f519-11e9-89cd-0050569dd159",
            "pointvalue": "25",
            "ucid": "aar73",
            "pointsearned": "4",
            "answer": "def list_array(a):\r\n    for x in range(len(a)):\r\n        print a[x];",
            "instructions": "Write a function with the name list_array that prints a given array.",
            "comment": "",
            "deductions": []
        }
    ]
}