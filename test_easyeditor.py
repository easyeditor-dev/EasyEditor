import unittest
from easyeditor import easy_editor

from flask_testing import TestCase


class EasyEditorTestCase(TestCase):
    def create_app(self):
        return easy_editor

    def test_index(self):
        self.client.get('/')
        self.assert_template_used('index.html')




if __name__ == '__main__':
    unittest.main()
