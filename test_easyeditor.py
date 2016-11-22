import os
import unittest

from easyeditor import easy_editor


class EasyEditorTestCase(unittest.TestCase):
    def test_static_dir(self):
        self.assertEqual(os.path.join(easy_editor.static_folder, 'UserFile'),
                         easy_editor.config['USER_FILE_DIR_PATH'])

        self.assertTrue(os.path.isdir(
            easy_editor.config['USER_FILE_DIR_PATH']))

if __name__ == '__main__':
    unittest.main()
